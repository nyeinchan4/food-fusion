-- -------------------------------------------------------------
-- TablePlus 6.8.0(654)
--
-- https://tableplus.com/
--
-- Database: food_fusion_db
-- Generation Time: 2026-01-17 22:33:17.0600
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inquiry_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`),
  CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cookies_consents`;
CREATE TABLE `cookies_consents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL,
  `accepted_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cookies_consents_user_id_foreign` (`user_id`),
  CONSTRAINT `cookies_consents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cuisine_types`;
CREATE TABLE `cuisine_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuisine_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `dietary_types`;
CREATE TABLE `dietary_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dietary_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `difficulties`;
CREATE TABLE `difficulties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `difficulties_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `display_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_is_active_event_date_index` (`is_active`,`event_date`),
  KEY `events_display_order_index` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_post_id_foreign` (`post_id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE `post_likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_likes_user_id_post_id_unique` (`user_id`,`post_id`),
  KEY `post_likes_post_id_foreign` (`post_id`),
  CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `type` enum('recipe','tip','experience') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recipe',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuisine_type_id` bigint unsigned DEFAULT NULL,
  `dietary_type_id` bigint unsigned DEFAULT NULL,
  `difficulty_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_community` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `recipes_user_id_foreign` (`user_id`),
  KEY `recipes_cuisine_type_id_foreign` (`cuisine_type_id`),
  KEY `recipes_dietary_type_id_foreign` (`dietary_type_id`),
  KEY `recipes_difficulty_id_foreign` (`difficulty_id`),
  CONSTRAINT `recipes_cuisine_type_id_foreign` FOREIGN KEY (`cuisine_type_id`) REFERENCES `cuisine_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `recipes_dietary_type_id_foreign` FOREIGN KEY (`dietary_type_id`) REFERENCES `dietary_types` (`id`) ON DELETE SET NULL,
  CONSTRAINT `recipes_difficulty_id_foreign` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulties` (`id`) ON DELETE SET NULL,
  CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `resource_categories`;
CREATE TABLE `resource_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resource_categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `resources_category_id_foreign` (`category_id`),
  CONSTRAINT `resources_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `failed_login_attempts` tinyint unsigned NOT NULL DEFAULT '0',
  `locked_until` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `inquiry_type`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, 'John Doe', 'contact@example.com', NULL, 'Test Subject', 'This is a test message.', '2026-01-17 10:38:01', '2026-01-17 10:38:01');

INSERT INTO `cuisine_types` (`id`, `name`) VALUES
(1, 'Italian'),
(2, 'Chinese'),
(3, 'Indian'),
(4, 'Mexican'),
(5, 'Thai'),
(6, 'Burmese');

INSERT INTO `dietary_types` (`id`, `name`) VALUES
(1, 'Vegan'),
(2, 'Vegetarian'),
(3, 'Gluten Free'),
(4, 'Keto'),
(5, 'Paleo'),
(6, 'Pescatarian'),
(7, 'Dairy Free'),
(8, 'Nut Free'),
(9, 'Low Carb'),
(10, 'Low Fat'),
(11, 'Low Sodium'),
(12, 'Sugar Free'),
(13, 'Whole30'),
(14, 'Mediterranean'),
(15, 'Raw Food'),
(16, 'Flexitarian'),
(17, 'Plant-Based'),
(18, 'Halal'),
(19, 'Kosher'),
(20, 'Diabetic Friendly'),
(21, 'Heart Healthy'),
(22, 'Kidney Friendly');

INSERT INTO `difficulties` (`id`, `name`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

INSERT INTO `events` (`id`, `title`, `description`, `image_path`, `event_date`, `location`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Summer Cooking Masterclass', 'Join our expert chefs for an immersive cooking experience featuring seasonal summer ingredients. Learn professional techniques, knife skills, and plating presentations. Perfect for home cooks looking to elevate their culinary game. Limited spots available!', 'events/summer-event.jpg', '2026-02-01 14:00:00', 'Food Fusion Culinary Center, Downtown', 1, 1, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(2, 'Italian Pasta Making Workshop', 'Discover the art of authentic Italian pasta making from scratch. Learn to create fresh fettuccine, ravioli, and gnocchi using traditional techniques passed down through generations. Includes wine pairing session and recipe booklet.', 'events/italian-event.avif', '2026-02-08 18:30:00', 'Little Italy Community Kitchen', 1, 2, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(3, 'Farm-to-Table Dinner Experience', 'Experience a unique 5-course dinner prepared with locally sourced ingredients from partner farms. Meet the farmers, learn about sustainable agriculture, and enjoy an evening of exceptional food and community. Vegetarian and vegan options available.', 'events/farm-to-table-event.jpg', '2026-02-16 19:00:00', 'Green Valley Farm & Restaurant', 1, 3, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(4, 'Asian Fusion Street Food Festival', 'Explore the vibrant flavors of Asian street food with live cooking demonstrations, tastings from 20+ vendors, and interactive workshops. From Korean BBQ to Thai noodles, Vietnamese banh mi to Japanese takoyaki - a culinary journey awaits!', 'events/asian-street-food-event.jpg', '2026-03-03 11:00:00', 'Central Park Pavilion', 1, 4, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(5, 'Baking & Pastry Fundamentals', 'Master the basics of baking with our comprehensive workshop covering breads, cakes, and pastries. Learn about ingredient science, proper measurements, and troubleshooting common baking problems. Take home your delicious creations!', 'events/baking-event.jpeg', '2026-02-24 10:00:00', 'Sweet Dreams Bakery School', 1, 5, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(6, 'Wine & Cheese Pairing Evening', 'An elegant evening exploring the perfect marriage of wine and cheese. Our sommelier will guide you through 6 wine selections paired with artisanal cheeses from around the world. Learn tasting techniques and pairing principles.', 'events/wine-event.jpeg', '2026-03-10 19:30:00', 'The Wine Cellar, Harbor District', 1, 6, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(7, 'Healthy Meal Prep Workshop', 'Learn to prepare a week\'s worth of nutritious, delicious meals in just one session. Focus on balanced nutrition, portion control, and time-saving techniques. Includes meal planning templates and storage tips for busy professionals.', 'events/healthy-event.webp', '2026-01-25 13:00:00', 'Wellness Kitchen Studio', 1, 7, '2026-01-17 10:38:01', '2026-01-17 10:38:01');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_22_130639_create_cuisine_types_table', 1),
(5, '2025_12_22_130700_create_dietary_types_table', 1),
(6, '2025_12_22_130714_create_difficulties_table', 1),
(7, '2025_12_22_130728_create_recipes_table', 1),
(8, '2025_12_22_130804_create_resource_categories_table', 1),
(9, '2025_12_22_130837_create_resources_table', 1),
(10, '2025_12_22_130901_create_posts_table', 1),
(11, '2025_12_22_130947_create_cookies_consents_table', 1),
(12, '2025_12_27_000000_create_contacts_table', 1),
(13, '2025_12_30_000000_create_post_comments_table', 1),
(14, '2025_12_30_000001_create_post_likes_table', 1),
(15, '2026_01_14_043600_create_events_table', 1);

INSERT INTO `posts` (`id`, `user_id`, `type`, `title`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'recipe', 'My Grandmother\'s Traditional Mote Hin Gar Recipe', 'Today I want to share my grandmother\'s authentic mote hin gar recipe that has been passed down through generations. The secret is in the rice preparation - you need to soak it overnight and use freshly grated coconut. The fish should be steamed just right so it flakes perfectly when mixed with the rice. Don\'t forget the traditional spices: turmeric, ginger, and garlic paste. This dish brings back so many childhood memories of family gatherings in Yangon. What are your traditional family recipes?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(2, 2, 'recipe', 'Perfect Thai Green Curry - Restaurant Quality at Home!', 'After months of experimenting, I finally nailed the perfect Thai green curry! The key is using fresh Thai basil and making your own curry paste. I use green chilies, lemongrass, galangal, kaffir lime leaves, and shallots. The coconut milk quality makes a huge difference - use full-fat for the best results. I add chicken, eggplant, and bamboo shoots. Serve with jasmine rice and you\'ll feel like you\'re dining in Bangkok! Anyone else struggle with getting the right spice balance?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(3, 3, 'recipe', 'Quick 15-Minute Pasta That Changed My Weeknight Dinners', 'As a busy parent, I discovered this amazing pasta recipe that saves me every evening. While the pasta boils, I sauté garlic in olive oil, add cherry tomatoes, spinach, and a splash of white wine. Toss with the pasta, add parmesan cheese and fresh basil. The whole thing takes 15 minutes from start to finish! My kids actually eat their vegetables this way. What are your go-to quick dinner solutions?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(4, 1, 'recipe', 'The Science Behind Perfect Sourdough Bread', 'I\'ve been baking sourdough for 2 years now and wanted to share some scientific insights. The key is maintaining your starter at 75°F and feeding it consistently. I use a 1:1:1 ratio of starter:flour:water. For the dough, 75% hydration gives the best texture. Bulk fermentation for 4-6 hours, then shape and cold proof overnight. The steam in the oven creates that perfect crust. My starter is named \"Bubbles\" and is 3 years old! Share your sourdough stories below.', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(5, 4, 'recipe', 'Vegan Tacos That Even Meat Lovers Will Enjoy', 'I created these amazing vegan tacos that converted my carnivore friends! I use seasoned lentils as the base, roasted sweet potatoes, and avocado crema. The magic is in the seasoning: cumin, smoked paprika, chili powder, and a touch of cinnamon. Top with pickled red onions, cilantro, and lime wedges. Serve in corn tortillas for the authentic experience. Even my dad who swore by beef tacos now requests these! What are your favorite plant-based protein alternatives?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(6, 2, 'recipe', 'Japanese Home Cooking: My Oyakodon Journey', 'Learning to make authentic oyakodon (chicken and egg rice bowl) has been my latest obsession. The technique seems simple but requires precision. The key is using dashi stock, mirin, and soy sauce in the right proportions. Cook the chicken first, then add sliced onions, and finally pour beaten eggs over everything. Don\'t overcook the eggs - they should be slightly runny. Garnish with scallions and shichimi togarashi. It\'s comfort food at its finest! What Japanese dishes should I try next?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(7, 3, 'recipe', 'Meal Prep Sunday: 5 Days of Healthy Lunches', 'I started meal prepping and it\'s been life-changing! Here\'s my weekly routine: Sunday I make quinoa bowls with roasted vegetables, chickpea curry, grilled chicken salads, lentil soup, and breakfast burritos. Everything gets portioned into glass containers. The secret is varying the flavors so you don\'t get bored - Mediterranean, Mexican, Asian, and Indian inspired dishes. This saves me $200/month on lunch and I\'m eating healthier! What are your meal prep strategies?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(8, 5, 'recipe', 'From Garden to Table: Fresh Herb Gardening Tips', 'I started a small herb garden on my balcony and the difference in my cooking is incredible! Basil, mint, rosemary, thyme, and parsley grow easily in pots. The key is good drainage and morning sun. I harvest in the morning when oils are strongest. Fresh basil in pasta, mint in tea, rosemary on roasted potatoes - the flavors are so much better than store-bought. Plus, it\'s cheaper and sustainable! What herbs do you grow at home?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(9, 4, 'recipe', 'The Perfect Chocolate Chip Cookie - Science and Soul', 'After 47 batches, I\'ve perfected my chocolate chip cookie recipe! The science: browned butter adds nutty flavor, bread flour gives chewy texture, and resting the dough 24 hours develops flavor. The soul: using high-quality chocolate chunks and a sprinkle of sea salt on top. Bake at 375°F for exactly 11 minutes for edges that are crisp but centers that stay soft. My family says these are better than bakery cookies! What\'s your secret ingredient for perfect cookies?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(10, 1, 'recipe', 'Cooking with Kids: Making Memories in the Kitchen', 'I started cooking with my 6-year-old daughter and it\'s been amazing for our bond! We make simple things like pizza, decorated cookies, and fruit salads. She loves measuring ingredients and mixing. Yes, it\'s messy and takes twice as long, but the confidence she\'s gained is priceless. She\'s now trying vegetables she refused before because she helped prepare them. We\'re making a recipe book with her drawings. How do you get kids involved in cooking?', NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01');

INSERT INTO `recipes` (`id`, `user_id`, `title`, `description`, `image_path`, `cuisine_type_id`, `dietary_type_id`, `difficulty_id`, `created_at`, `is_community`) VALUES
(1, 1, 'Mote Hin Khar', 'To make mote hin khar, Myanmar\'s national dish, you will prepare a rich, savory fish broth and serve it over rice vermicelli noodles with various garnishes. The key is the slow-simmered broth, thickened with rice or chickpea flour and infused with lemongrass, ginger, garlic, and fish. Below is a general recipe; specific measurements can be adjusted to personal taste.\n\nIngredients For the Broth Base:\n- Fish: About 600g to 1kg of white fish, such as catfish or mrigal carp, cleaned.\n- Aromatics: Onions, garlic, ginger, lemongrass stalks, and dried chilies.\n- Seasoning: Turmeric powder, fish sauce, black pepper, and salt.\n- Thickener: 1 cup chickpea flour or toasted rice flour, mixed with water.\n- Optional: Sliced banana stem (soaked in salt water), whole shallots, and boiled duck or chicken eggs.\n\nTo Serve:\n- Thin rice vermicelli noodles, cooked.\n- Garnishes: Fresh cilantro, mint leaves, lime wedges, chili flakes, crispy fried split peas or fried garlic oil, and extra fish sauce.\n\nInstructions:\n1. Prepare the Fish and Broth: Boil the fish with lemongrass, ginger, turmeric, and fish sauce. Simmer until cooked. Debone and flake.\n2. Create the Aromatic Paste and Fish Mixture: Sauté onions, garlic, ginger, lemongrass. Add fish and cook a few minutes.\n3. Assemble and Simmer the Soup: Combine fish mixture with stock, thicken with chickpea/rice flour slurry, season to taste.\n4. Serve: Place noodles in bowls, pour soup over, garnish, and enjoy.', 'recipes/e4K8hAF7oRY3UYnNCvHdygpUEIyedEpiPKzinwW7.jpg', 6, 1, 2, '2026-01-17 17:08:01', 0),
(2, 1, 'Ohn Noe Noodle', 'Ohn No Khao Swe is a popular Burmese comfort dish featuring wheat noodles in a rich, creamy chicken and coconut milk broth thickened with chickpea flour.\n\nIngredients For the Broth:\n- Chicken: 1 lb boneless chicken thighs or breast, cubed.\n- Aromatics: Onion, garlic, ginger.\n- Spices: Turmeric powder, paprika, optional chili powder.\n- Liquids: Chicken stock, coconut milk, fish sauce.\n- Thickener: Chickpea flour slurry.\n\nFor Serving & Garnishing:\n- Noodles, hard-boiled eggs, lime, cilantro, shallots, fried onions.\n\nInstructions:\n1. Marinate chicken with fish sauce, turmeric, and salt.\n2. Sauté onions, garlic, ginger until fragrant. Brown chicken with spices.\n3. Simmer broth, thicken with chickpea slurry.\n4. Stir in coconut milk, adjust seasoning.\n5. Serve over cooked noodles with garnishes.', 'recipes/2AAjehL9sfPSYu1Jt4ejipGc5Yzu4yXJyiwjllSn.jpg', 6, 4, 3, '2026-01-17 17:08:01', 0),
(3, 1, 'Pork Sticky Rice', '\"Pork kauk nyin\" refers to Burmese sticky rice served with pork, a popular breakfast or street food dish.\n\nCommon preparations:\n- Pork Curry: Served with sticky rice.\n- Pork Skewers: Marinated, grilled, served with sticky rice.\n- Pork Offal: Assorted skewers with sticky rice.\n\nThe sticky rice itself is steamed and sometimes mixed with boiled peas. Garnish with crispy fried onions or boiled eggs.', 'recipes/bzVbm48A6ryzkQCHZXYMWhAesI9dVz8R3kV1oJWV.jpg', 6, NULL, 3, '2026-01-17 17:08:01', 0),
(4, 1, 'Shan Noodle', 'Making Shan Noodle (Shan Khao Swe), a staple of Burmese cuisine from Shan State, involves preparing a savory tomato-based meat sauce served over rice noodles with garnishes.\n\nIngredients:\n- Noodles: Soak and boil rice noodles.\n- Meat Sauce: Ground chicken or pork, tomatoes, onion, garlic, ginger, tomato paste, chili powder.\n- Seasoning: Soy sauce, fish sauce, sugar, turmeric.\n- Garnishes: Crushed peanuts, pickled mustard greens, fried garlic, spring onions, coriander.\n\nInstructions:\n1. Prepare noodles.\n2. Cook meat sauce with aromatics and seasonings.\n3. Assemble noodles and sauce, add garnishes.', 'recipes/WI01Gecb7ylh2INtb2hFODrEUPJNjlDZNUtdA9bi.webp', 6, NULL, 2, '2026-01-17 17:08:01', 0),
(5, 1, 'Nan Gyi Thoke', 'Nan Gyi Thoke is a Burmese noodle salad made by combining thick rice noodles with rich chicken curry, chili oil, and garnishes, tossed with toasted chickpea flour.\n\nIngredients:\n- Chicken curry: chicken, onion, garlic, ginger, fish sauce, turmeric, paprika.\n- Salad base: thick noodles, chickpea flour, eggs, onions, cilantro, lime, optional cabbage or roasted peanuts.\n\nInstructions:\n1. Cook noodles.\n2. Make chili oil.\n3. Toast chickpea flour.\n4. Prepare garnishes.\n5. Cook chicken curry, mix with noodles and garnishes.\n6. Serve immediately with optional broth on the side.', 'recipes/cbbYJhdIk4mFplssA5Y8kUBjchTSwwzdoqbmYNQT.webp', 6, NULL, 2, '2026-01-17 17:08:01', 0),
(6, 1, 'Mala Xiang Guo (麻辣香锅)', '🌶️ Mala Xiang Guo (麻辣香锅) — Spicy, Numbing, Stir-Fry Hot Pot. A Sichuan classic with meat, seafood, and vegetables stir-fried with chili, aromatics, and Sichuan peppercorns.\n\nIngredients:\n- Proteins: pork belly or beef, shrimp.\n- Vegetables: potatoes, broccoli, mushrooms, lotus root, bean curd sticks.\n- Aromatics & Seasoning: garlic, ginger, dried chilies, doubanjiang, Sichuan peppercorns, soy sauce, sugar, Shaoxing wine.\n- Garnish: cilantro, roasted peanuts, sesame seeds.\n\nInstructions:\n1. Cut and blanch ingredients.\n2. Build Mala base in wok with aromatics and seasoning.\n3. Stir-fry ingredients together.\n4. Garnish and serve immediately with steamed rice.', 'recipes/9MRXTJnKxzVGTP2h6wW9eeLzuQdwhKGhfPPGdhUq.jpg', 2, NULL, 3, '2026-01-17 17:08:01', 0);

INSERT INTO `resource_categories` (`id`, `name`) VALUES
(1, 'Culinary'),
(2, 'Educational');

INSERT INTO `resources` (`id`, `title`, `description`, `category_id`, `file_path`, `file_type`, `created_at`, `updated_at`) VALUES
(1, 'Knife Master Skills Tutorial', 'Advanced knife techniques and cutting skills for home cooks. Learn professional cutting methods, knife safety, and essential culinary skills.', 1, 'resources/knife-mater-skill.mp4', 'mp4', '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(2, 'Food Safety Checklist', 'Essential food safety guidelines and kitchen hygiene practices. Comprehensive checklist for maintaining food safety standards in home cooking.', 1, 'resources/food-safety-checklist.pdf', 'pdf', '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(3, 'Essential Spices Guide', 'Complete guide to essential cooking spices and their uses. Visual reference for common spices and their applications in various cuisines.', 1, 'resources/essential-spices.jpg', 'jpg', '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(4, 'Solar Installation Guide', 'Complete guide for residential solar panel installation. Step-by-step instructions, safety guidelines, and cost analysis for home solar systems.', 2, 'resources/solar-installation-guide.pdf', 'pdf', '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(5, 'How Wind Generate Power Tutorial', 'Educational video on wind turbine technology and power generation. Learn how wind energy works and its environmental benefits.', 2, 'resources/how-wind-generate-power.mp4', 'mp4', '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(6, 'Green Energy Infographic', 'Visual guide to renewable energy sources and sustainability. Comprehensive overview of green energy options and their impact.', 2, 'resources/green-energy-infographic.png', 'png', '2026-01-17 10:38:01', '2026-01-17 10:38:01');

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VHZPl21C0AMzoCh1JaScqVPwwsp2i46ZVBmgCfNO', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFpVbVIzNkxsMGJQQUdBVXlxOW5EeU9SN3RNdVY2WllSZk8wVGdVayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9lZHVjYXRpb25hbC1yZXNvdXJjZXMiO3M6NToicm91dGUiO3M6MjE6ImVkdWNhdGlvbmFsLXJlc291cmNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768647317);

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_verified`, `is_admin`, `failed_login_attempts`, `locked_until`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '$2y$12$k/Nl/dUAOejWGV9V6vZIJeBZsB1LfWUspD9Pku3JamTuVIfTp8rD.', 1, 1, 0, NULL, '2026-01-17 10:38:00', '2026-01-17 10:38:00'),
(2, 'Test', 'User', 'test@gmail.com', '$2y$12$PbCf7RFuyZjG5RWFswotS.JJbIIa8FVa.X9AV3sjypITE3zUhfkaS', 0, 0, 0, NULL, '2026-01-17 10:38:00', '2026-01-17 10:38:00'),
(3, 'Sarah', 'Chen', 'sarah.chen@gmail.com', '$2y$12$35lnc./Vne.FqsZ.wr3t/e/sg4aNo0H72ro1M3GPuhLxwvINRHSUW', 1, 0, 0, NULL, '2026-01-17 10:38:00', '2026-01-17 10:38:00'),
(4, 'Michael', 'Johnson', 'michael.j@gmail.com', '$2y$12$Vd2TkqBYu5oPhotPjJjh0ubwQTciIJj6zO4fo0OECC9n5aDo7ij6q', 1, 0, 0, NULL, '2026-01-17 10:38:00', '2026-01-17 10:38:00'),
(5, 'Emma', 'Wilson', 'emma.wilson@gmail.com', '$2y$12$DxR87bgeWBvnO9nQMC/4H.8d.LTeYzh1t/ZyLEAnkh688fUvSaKxq', 0, 0, 0, NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01'),
(6, 'David', 'Kumar', 'david.kumar@gmail.com', '$2y$12$NNjDJqDxY5xfDxjKHihPT.eukEFyTR362dc1Qr0f6YhOaKRcCo7bW', 1, 0, 0, NULL, '2026-01-17 10:38:01', '2026-01-17 10:38:01');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;