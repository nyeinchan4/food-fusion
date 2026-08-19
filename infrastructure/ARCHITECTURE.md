# Food-Fusion — AWS Infrastructure Architecture
# Region: ap-southeast-1 (Singapore)
# Stack: food-fushion-prod-stack

═══════════════════════════════════════════════════════════════════════════════════════════
                               CI/CD — GITHUB ACTIONS
═══════════════════════════════════════════════════════════════════════════════════════════

  GitHub (nyeinchan4/food-fusion)  ──push──►  GitHub Actions Workflow
      │                                              │
      │  OIDC (no long-lived keys)                   │  1. Build Docker image
      └──────────────────────────────────────────────┤  2. Push → ECR
                                                     │  3. Register ECS task def
  AWS IAM OIDC Provider                              │  4. Force-deploy ECS service
  token.actions.githubusercontent.com                │
      │                                              │
      └──► prod-food-fusion-github-deploy-role  ◄────┘
           (sts:AssumeRoleWithWebIdentity)
           Permissions: ECR push, ECS deploy,
                        SSM read, IAM PassRole

═══════════════════════════════════════════════════════════════════════════════════════════
                              DNS & TLS TERMINATION
═══════════════════════════════════════════════════════════════════════════════════════════

  Route 53 (nexusunified.online)
      │
      ├── A  nexusunified.online     ──► ALB (Alias)
      └── A  www.nexusunified.online ──► ALB (Alias)

  ACM Certificate (*.nexusunified.online)
      └── Attached to ALB HTTPS Listener

═══════════════════════════════════════════════════════════════════════════════════════════
                             VPC  (12.10.0.0/16)
═══════════════════════════════════════════════════════════════════════════════════════════

  ┌─────────────────────────────────────────────────────────────────────────────────────┐
  │  VPC  12.10.0.0/16                                                                  │
  │                                                                                     │
  │  ┌──────────────────────────────┐  ┌──────────────────────────────┐                │
  │  │   AZ-1a  (ap-southeast-1a)   │  │   AZ-1b  (ap-southeast-1b)   │                │
  │  │                              │  │                              │                │
  │  │  ┌────────────────────────┐  │  │  ┌────────────────────────┐  │                │
  │  │  │  Public Subnet          │  │  │  │  Public Subnet          │  │                │
  │  │  │  12.10.0.0/24           │  │  │  │  12.10.1.0/24           │  │                │
  │  │  │                        │  │  │  │                        │  │                │
  │  │  │  ┌──────────────────┐  │  │  │  │  ┌──────────────────┐  │  │                │
  │  │  │  │  NAT Gateway     │  │  │  │  │  │  ALB Node        │  │  │                │
  │  │  │  │  (Elastic IP)    │  │  │  │  │  │                  │  │  │                │
  │  │  │  └──────────────────┘  │  │  │  │  └──────────────────┘  │  │                │
  │  │  └────────────────────────┘  │  │  └────────────────────────┘  │                │
  │  │                              │  │                              │                │
  │  │  ┌────────────────────────┐  │  │  ┌────────────────────────┐  │                │
  │  │  │  Private Subnet         │  │  │  │  Private Subnet         │  │                │
  │  │  │  12.10.2.0/24           │  │  │  │  12.10.3.0/24           │  │                │
  │  │  │                        │  │  │  │                        │  │                │
  │  │  │  ┌──────────────────┐  │  │  │  │  ┌──────────────────┐  │  │                │
  │  │  │  │  ECS Fargate     │  │  │  │  │  │  ECS Fargate     │  │  │                │
  │  │  │  │  Tasks           │  │  │  │  │  │  Tasks           │  │  │                │
  │  │  │  └──────────────────┘  │  │  │  │  └──────────────────┘  │  │                │
  │  │  └────────────────────────┘  │  │  └────────────────────────┘  │                │
  │  │                              │  │                              │                │
  │  │  ┌────────────────────────┐  │  │  ┌────────────────────────┐  │                │
  │  │  │  Data Subnet            │  │  │  │  Data Subnet            │  │                │
  │  │  │  12.10.4.0/24           │  │  │  │  12.10.5.0/24           │  │                │
  │  │  │                        │  │  │  │                        │  │                │
  │  │  │  ┌──────────────────┐  │  │  │  │  ┌──────────────────┐  │  │                │
  │  │  │  │  RDS Primary      │  │  │  │  │  │  RDS Standby     │  │  │                │
  │  │  │  │  (MySQL 8.0)      │  │  │  │  │  │  (Subnet Group)  │  │  │                │
  │  │  │  └──────────────────┘  │  │  │  │  └──────────────────┘  │  │                │
  │  │  └────────────────────────┘  │  │  └────────────────────────┘  │                │
  │  └──────────────────────────────┘  └──────────────────────────────┘                │
  └─────────────────────────────────────────────────────────────────────────────────────┘
         │ Internet Gateway
  ───────┴─────────── Internet ──────────────────►  Users

═══════════════════════════════════════════════════════════════════════════════════════════
                          REQUEST FLOW (HTTPS)
═══════════════════════════════════════════════════════════════════════════════════════════

  Browser
    │  HTTPS :443  nexusunified.online
    ▼
  ┌─────────────────────────────────────────────────────────────┐
  │  Application Load Balancer  (prod-food-fusion-alb)          │
  │  Security Group: ALBSecurityGroup                           │
  │    Ingress: 80 (→ 301 redirect HTTPS), 443 from 0.0.0.0/0  │
  │                                                             │
  │  Listener :80   ── redirect ──► :443                        │
  │  Listener :443  ── forward  ──► FrontendTargetGroup         │
  │    Health check: GET /health  (Nginx returns 200 directly)  │
  └─────────────────────────────────────────────────────────────┘
                │
                │  HTTP :80  (private)
                ▼
  ┌─────────────────────────────────────────────────────────────┐
  │  ECS Service: prod-food-fusion-frontend-svc                 │
  │  Task: prod-food-fusion-frontend-task  (Fargate 0.25vCPU)   │
  │  Image: ECR food-fusion-frontend:latest                     │
  │  SG: FrontendTaskSecurityGroup                              │
  │    Ingress: :80 from ALBSecurityGroup only                  │
  │                                                             │
  │  Container: Nginx                                           │
  │    ├── Serves static assets (JS/CSS/images from public/)    │
  │    ├── Proxies *.php → PHP-FPM via FastCGI                  │
  │    ├── BACKEND_HOST from SSM → Cloud Map DNS resolution      │
  │    └── /health → return 200 (no PHP dependency)             │
  └─────────────────────────────────────────────────────────────┘
                │
                │  FastCGI :9000  (Cloud Map DNS: backend.food-fusion.local)
                │  Resolver: 169.254.169.253 (Fargate link-local DNS)
                ▼
  ┌─────────────────────────────────────────────────────────────┐
  │  ECS Service: prod-food-fusion-backend-svc                  │
  │  Task: prod-food-fusion-backend-task  (Fargate 0.5vCPU)     │
  │  Image: ECR food-fusion-backend:latest                      │
  │  SG: BackendTaskSecurityGroup                               │
  │    Ingress: :9000 from FrontendTaskSecurityGroup only       │
  │                                                             │
  │  Container: PHP-FPM 8.4                                     │
  │    ├── Laravel 12.x application                             │
  │    ├── Connects → RDS MySQL (DB_HOST from ECS env)          │
  │    ├── Connects → S3 (FILESYSTEM_DISK=s3, AWS_BUCKET)       │
  │    └── Reads secrets → SSM (APP_KEY, DB_PASSWORD)           │
  └─────────────────────────────────────────────────────────────┘
                │                        │
                │  MySQL :3306           │  S3 API
                ▼                        ▼
  ┌──────────────────────┐   ┌──────────────────────────────────┐
  │  RDS MySQL 8.0        │   │  S3 Bucket                       │
  │  prod-food-fusion-rds │   │  prod-food-fusion-media          │
  │  db.t3.micro          │   │  (user-uploaded images)          │
  │  Multi-AZ subnet group│   │  Public read, ECS write          │
  │  SG: RDSSecurityGroup │   │  CORS: GET * from any origin     │
  │    Ingress: :3306     │   │  DeletionPolicy: Retain          │
  │    from Backend+Queue │   └──────────────────────────────────┘
  └──────────────────────┘

═══════════════════════════════════════════════════════════════════════════════════════════
                          QUEUE WORKER
═══════════════════════════════════════════════════════════════════════════════════════════

  ┌─────────────────────────────────────────────────────────────┐
  │  ECS Service: prod-food-fusion-queue-svc                    │
  │  Task: prod-food-fusion-queue-task  (Fargate SPOT 0.25vCPU) │
  │  Image: ECR food-fusion-backend:latest  (same as backend)   │
  │  SG: QueueTaskSecurityGroup                                 │
  │    Ingress: none (outbound only)                            │
  │                                                             │
  │  Container: PHP-FPM → php artisan queue:work                │
  │    ├── Same env vars as backend (DB, S3, APP_KEY, etc.)     │
  │    └── Processes background jobs from DB queue              │
  └─────────────────────────────────────────────────────────────┘
                │
                │  MySQL :3306  (reads/writes job queue table)
                ▼
           RDS MySQL  (shared with backend)

═══════════════════════════════════════════════════════════════════════════════════════════
                          SERVICE DISCOVERY (AWS Cloud Map)
═══════════════════════════════════════════════════════════════════════════════════════════

  Private DNS Namespace: food-fusion.local
      │
      └── Service: backend
              DNS record type: A  (TTL 10s)
              Registered: BackendECSService (via ServiceRegistries)
              Resolves to: backend task's private IP
              Used by: Frontend Nginx  →  backend.food-fusion.local:9000

═══════════════════════════════════════════════════════════════════════════════════════════
                          ECR REPOSITORIES
═══════════════════════════════════════════════════════════════════════════════════════════

  food-fusion-frontend          ← Nginx + Vite built assets
  food-fusion-backend           ← PHP-FPM + Laravel app
  (scan on push: enabled)

═══════════════════════════════════════════════════════════════════════════════════════════
                          SECRETS & CONFIG
═══════════════════════════════════════════════════════════════════════════════════════════

  SSM Parameter Store
      ├── /food-fusion/prod/app/key          (SecureString)  → APP_KEY
      ├── /food-fusion/prod/db/password      (SecureString)  → DB_PASSWORD
      └── /food-fusion/prod/backend-host     (String)        → BACKEND_HOST (Nginx)

  ECS Execution Role reads SSM at task startup (never stored in task def plaintext)
  ECS Task Role has:
      ├── ssmmessages:* (ECS Exec / container shell access)
      └── s3:Get/Put/Delete on prod-food-fusion-media/*

═══════════════════════════════════════════════════════════════════════════════════════════
                          OBSERVABILITY
═══════════════════════════════════════════════════════════════════════════════════════════

  CloudWatch Log Group: /ecs/prod-food-fusion  (14-day retention)
      ├── frontend/prod-food-fusion-frontend/<task-id>
      ├── backend/prod-food-fusion-backend/<task-id>
      └── queue/prod-food-fusion-queue/<task-id>

═══════════════════════════════════════════════════════════════════════════════════════════
                          SECURITY GROUPS (summary)
═══════════════════════════════════════════════════════════════════════════════════════════

  ALBSecurityGroup
      Ingress:  :80  0.0.0.0/0
                :443 0.0.0.0/0
      Egress:   all

  FrontendTaskSecurityGroup
      Ingress:  :80  from ALBSecurityGroup
      Egress:   :9000 to BackendTaskSecurityGroup  (FastCGI)
                :443  to 0.0.0.0/0                 (ECR pull, SSM, S3)

  BackendTaskSecurityGroup
      Ingress:  :9000 from FrontendTaskSecurityGroup
                :9000 from QueueTaskSecurityGroup
      Egress:   :3306 to RDSSecurityGroup
                :443  to 0.0.0.0/0  (ECR pull, SSM, S3)

  QueueTaskSecurityGroup
      Ingress:  none
      Egress:   :3306 to RDSSecurityGroup
                :443  to 0.0.0.0/0  (ECR pull, SSM, S3)

  RDSSecurityGroup
      Ingress:  :3306 from BackendTaskSecurityGroup
                :3306 from QueueTaskSecurityGroup
      Egress:   none

═══════════════════════════════════════════════════════════════════════════════════════════
                          FULL COMPONENT SUMMARY
═══════════════════════════════════════════════════════════════════════════════════════════

  Networking       VPC, 2× Public/Private/Data subnets, IGW, NAT GW, 5× SGs
  DNS & TLS        Route 53 A records, ACM wildcard cert (*.nexusunified.online)
  Load Balancing   ALB with HTTP→HTTPS redirect, HTTPS listener, health /health
  Compute          ECS Fargate cluster, 3 services (frontend, backend, queue)
  Service Disc.    AWS Cloud Map (food-fusion.local, backend.food-fusion.local)
  Database         RDS MySQL 8.0, db.t3.micro, multi-AZ subnet group
  Storage          S3 bucket (media, public-read, CORS, 10yr lifecycle)
  Registry         ECR (frontend + backend), image scan on push
  Secrets          SSM Parameter Store (APP_KEY, DB_PASSWORD, BACKEND_HOST)
  Observability    CloudWatch Logs (/ecs/prod-food-fusion, 14-day retention)
  CI/CD            GitHub Actions + OIDC (no long-lived AWS keys)
  IAM              OIDC provider, GitHub deploy role, ECS execution role, task role
