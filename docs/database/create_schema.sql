CREATE TABLE `suscriptor` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `name` text,
  `email` text,
  `created_at` timestamp,
  `deleted_at` datetime
);

CREATE TABLE `suscription` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `suscriptor_id` integer,
  `barrio` text,
  `edificio` text,
  `payment_type_id` integer,
  `active` bool DEFAULT true,
  `created_at` datetime
);

CREATE TABLE `suscription_payment_type` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `name` text,
  `description` text,
  `active` bool DEFAULT true
);

CREATE TABLE `suscription_plan` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `suscription_id` integer,
  `plan_price_id` integer,
  `created_at` timestamp
);

CREATE TABLE `plan` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `name` text,
  `description` text,
  `active` bool DEFAULT true
);

CREATE TABLE `plan_price` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `price` float,
  `plan_id` integer,
  `created_at` timestamp
);

CREATE TABLE `billing` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `suscription_plan_id` integer,
  `billing_history_id` integer
);

CREATE TABLE `billing_history` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `billing_status_id` integer,
  `created_at` timestamp
);

CREATE TABLE `billing_status` (
  `id` integer AUTO_INCREMENT PRIMARY KEY,
  `name` text,
  `description` text,
  `active` bool DEFAULT true
);

ALTER TABLE `suscription` ADD FOREIGN KEY (`suscriptor_id`) REFERENCES `suscriptor` (`id`);

ALTER TABLE `suscription` ADD FOREIGN KEY (`payment_type_id`) REFERENCES `suscription_payment_type` (`id`);

ALTER TABLE `suscription_plan` ADD FOREIGN KEY (`suscription_id`) REFERENCES `suscription` (`id`);

ALTER TABLE `plan_price` ADD FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

ALTER TABLE `suscription_plan` ADD FOREIGN KEY (`plan_price_id`) REFERENCES `plan_price` (`id`);

ALTER TABLE `billing` ADD FOREIGN KEY (`suscription_plan_id`) REFERENCES `suscription_plan` (`id`);

ALTER TABLE `billing` ADD FOREIGN KEY (`billing_history_id`) REFERENCES `billing_history` (`id`);

ALTER TABLE `billing_history` ADD FOREIGN KEY (`billing_status_id`) REFERENCES `billing_status` (`id`);
