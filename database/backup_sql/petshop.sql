-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2025 às 11:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `animals`
--

INSERT INTO `animals` (`id`, `nome`, `especie`, `raca`, `cliente_id`, `created_at`, `updated_at`) VALUES
(1, 'Tata', 'Cachorro', 'Poodle', 1, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(2, 'Sheldon', 'Cachorro', 'Viralata', 1, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(3, 'Rex', 'Cachorro', 'Pastor Alemão', 2, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(4, 'Lili', 'Gato', 'Angora', 6, '2025-11-24 10:37:54', '2025-11-24 10:37:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal_servico`
--

CREATE TABLE `animal_servico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` bigint(20) UNSIGNED NOT NULL,
  `servico_id` bigint(20) UNSIGNED NOT NULL,
  `data_agendamento` datetime NOT NULL,
  `status` enum('agendado','concluido','cancelado') NOT NULL DEFAULT 'agendado',
  `observacao` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `animal_servico`
--

INSERT INTO `animal_servico` (`id`, `animal_id`, `servico_id`, `data_agendamento`, `status`, `observacao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-11-24 13:00:00', 'concluido', NULL, '2025-11-24 12:26:49', '2025-11-24 12:26:49'),
(2, 1, 6, '2025-11-24 13:00:00', 'concluido', NULL, '2025-11-24 12:26:49', '2025-11-24 12:26:49'),
(3, 1, 9, '2025-11-24 13:00:00', 'concluido', NULL, '2025-11-24 12:26:49', '2025-11-24 12:26:49'),
(4, 2, 11, '2025-11-25 09:05:00', 'agendado', NULL, '2025-11-24 13:04:51', '2025-11-24 13:04:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`, `created_at`, `updated_at`) VALUES
(1, 'Isabela Nista', 'isabela.messias@edu.santoinacio-rio.com.br', '21 98519-7364', '20251-060', 'Rua Barão de Petrópolis', '501', 'Rio Comprido', 'Rio de Janeiro', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:07:38'),
(2, 'Luciene Motta', 'luciene.motta@santoinacio-rio.com.br', '21 93184-6200', '20021-000', 'Rua da Glória', '345', 'Glória', 'Rio de Janeiro', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:15:40'),
(3, 'Marcela Paulino', 'marcela.paulino@edu.santoinacio-rio.com.br', '21 98352-9812', '22290-240', 'Avenida Pasteur', '404', 'Botafogo', 'Rio de Janeiro', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:12:02'),
(4, 'Camile Sampaio', 'camille.chapeta@edu.santoinacio-rio.com.br', '21 97620-5066', '21235070', 'Rua Cisplatina', '148', 'Irajá', 'Rio de Janeiro', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:10:28'),
(5, 'Leandro Vasconcelos', 'leandro.vasconcelos@edu.santoinacio-rio.com.br', '21 96416-7405', '25251-300', 'Rua Bernardo Vasconcelos', '158', 'Parque Santa Lúcia', 'Duque de Caxias', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:13:57'),
(6, 'Liliam Fabrício', 'liliam.silva@edu.santoinacio-rio.com.br', '21 96408-3053', '21040-000', 'Parque União', '600', 'Maré', 'Rio de Janeiro', 'RJ', NULL, '2025-11-24 10:37:54', '2025-11-24 11:14:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_07_151348_create_clientes_table', 1),
(5, '2025_11_07_151400_create_animals_table', 1),
(6, '2025_11_07_151412_create_servicos_table', 1),
(7, '2025_11_24_091958_create_animal_servico_table', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES
(1, 'Banho Simples (Pequeno Porte)', 'Banho com shampoo neutro, corte de unhas e limpeza de ouvidos para cães até 10kg.', 50.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(2, 'Banho Simples (Médio Porte)', 'Banho completo para cães de 10kg a 25kg. Inclui secagem e perfume.', 70.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(3, 'Banho Simples (Grande Porte)', 'Banho reforçado para cães acima de 25kg (Golden, Labrador, etc).', 90.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(4, 'Tosa Higiênica', 'Corte de pelos nas patas, barriga e região íntima para higiene.', 40.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(5, 'Tosa Completa (Máquina)', 'Tosa geral na máquina (altura a combinar) + Banho completo.', 100.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(6, 'Tosa na Tesoura (Styling)', 'Acabamento refinado feito manualmente na tesoura para raças específicas.', 150.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(7, 'Hidratação Profunda', 'Tratamento com máscara de argan para pelos ressecados (Adicional ao banho).', 35.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(8, 'Corte de Unhas (Avulso)', 'Serviço rápido de corte e lixamento de unhas.', 20.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(9, 'Consulta Veterinária', 'Avaliação clínica geral do animal em horário comercial.', 120.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(10, 'Vacina V10/V8 (Importada)', 'Proteção anual contra cinomose, parvovirose e outras doenças.', 110.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(11, 'Vacina Antirrábica', 'Vacina obrigatória anual contra a raiva.', 80.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(12, 'Aplicação de Medicamento', 'Aplicação de injeção ou remédio oral (não inclui o custo do remédio).', 30.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(13, 'Diária de Hotelzinho', 'Hospedagem por 24h com alimentação e recreação inclusas.', 100.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(14, 'DayCare (Creche)', 'Período integral de brincadeiras e socialização (sem pernoite).', 70.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54'),
(15, 'Táxi Dog (Bairro)', 'Busca e entrega do animal dentro do bairro (valor por trecho).', 20.00, '2025-11-24 10:37:54', '2025-11-24 10:37:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ouFPVxZs4asiNbvSDllGC9L5QVCzmtkj2g7CtJtq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2theVRiQWczQjlOM3I1TGNEZlBkSW1xaXB0bHRVZHgyNTZkR1g2ZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZ2VuZGFtZW50byI7czo1OiJyb3V0ZSI7czoxNzoiYWdlbmRhbWVudG8uaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763979900);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_cliente_id_foreign` (`cliente_id`);

--
-- Índices de tabela `animal_servico`
--
ALTER TABLE `animal_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_servico_animal_id_foreign` (`animal_id`),
  ADD KEY `animal_servico_servico_id_foreign` (`servico_id`);

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `animal_servico`
--
ALTER TABLE `animal_servico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `animal_servico`
--
ALTER TABLE `animal_servico`
  ADD CONSTRAINT `animal_servico_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `animal_servico_servico_id_foreign` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
