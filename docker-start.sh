#!/bin/bash
# Quick start script for Docker deployment

echo "🚀 Food Fusion Docker Deployment"
echo "================================="
echo ""

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo "❌ Docker is not installed. Please install Docker first."
    exit 1
fi

# Check if Docker Compose is installed
if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose is not installed. Please install Docker Compose first."
    exit 1
fi

# Check if .env exists, if not copy from example
if [ ! -f .env ]; then
    echo "📝 Creating .env file from .env.docker.example..."
    cp .env.docker.example .env
    echo "✅ .env file created. Please review and update if needed."
else
    echo "✅ .env file already exists"
fi

# Build and start services
echo ""
echo "🔨 Building Docker images..."
docker-compose build

echo ""
echo "🚀 Starting services..."
docker-compose up -d

echo ""
echo "⏳ Waiting for services to be ready..."
sleep 10

# Check service status
echo ""
echo "📊 Service Status:"
docker-compose ps

echo ""
echo "✅ Food Fusion is starting!"
echo ""
echo "🌐 Access the application at: http://localhost"
echo ""
echo "📚 Useful commands:"
echo "  make logs        - View logs"
echo "  make seed        - Seed database"
echo "  make down        - Stop services"
echo "  make help        - Show all commands"
echo ""
echo "📖 For detailed documentation, see docker-setup-guide.md"
