INSERT INTO `billing_status` (`id`, `name`, `description`, `active`) VALUES
(1, 'Generated', 'Payment coupon generated', 1),
(2, 'Sent', 'Payment coupon sent', 1),
(3, 'Paid', 'Coupon payment validated', 1);

-- --------------------------------------------------------

INSERT INTO `plan` (`id`, `name`, `description`, `active`) VALUES
(1, 'Basic', 'Basic', 1),
(2, 'Pro', 'Pro', 1),
(3, 'Enterprise', 'Enterprise', 1);

-- --------------------------------------------------------

INSERT INTO `plan_price` (`id`, `price`, `plan_id`, `created_at`) VALUES
(1, 10000, 1, '2024-02-06 17:04:42'),
(2, 25000, 2, '2024-02-06 17:04:42'),
(3, 70000, 3, '2024-02-06 17:04:53');

-- --------------------------------------------------------

INSERT INTO `suscription_payment_type` (`id`, `name`, `description`, `active`) VALUES
(1, 'Debit', 'Debit by CBU', 1),
(2, 'Credit', 'Credit card', 1);

-- --------------------------------------------------------

INSERT INTO `suscriptor` (`id`, `name`, `email`, `created_at`, `deleted_at`) VALUES
(1, 'Pepe', 'Pepe@demo.com', '2024-02-06 17:48:30', NULL),
(2, 'Moni', 'Moni@demo.com', '2024-02-06 17:48:30', NULL);
