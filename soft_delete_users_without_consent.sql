-- INSERT INTO `codeweek_prod`.`users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `country_iso`, `remember_token`, `created_at`, `updated_at`, `privacy`, `email_display`, `receive_emails`, `approved`, `magic_key`, `consent_given_at`, `future_consent_given_at`, `email_verified_at`) VALUES (1000000, 'Codeweek Legacy User', 'Codeweek Legacy', 'codeweek-legacy', '$2y$10$zcr85hlNx0U1aKpLtpsoKeAuPeSh1U9TxDY/A045m0y.5eXARsFg6', 'legacy@codeweek.eu', 'BE', '5Pb4APP0CkOmQFzDtR960OlkdreLev2tvfUiywDawyJOmKDvFb3bmOAWlUL6', now(), now(), 1, 'legacy@codeweek.eu', 0, 1, 2520090911, now(), now(), now());

DROP TABLE IF EXISTS users_to_delete;
-- Create temporary table with users to process
CREATE TEMPORARY TABLE users_to_delete AS
SELECT id
FROM users
WHERE consent_given_at IS NULL
LIMIT 1000;  -- Process in chunks of 1000

-- Add index to improve performance
ALTER TABLE users_to_delete ADD INDEX (id);

START TRANSACTION;
-- Update events creator_id
UPDATE events e
INNER JOIN users_to_delete u ON e.creator_id = u.id
SET e.creator_id = 1000000;
COMMIT;

START TRANSACTION;
-- Update events approved_by
UPDATE events e
INNER JOIN users_to_delete u ON e.approved_by = u.id
SET e.approved_by = 1000000;
COMMIT;

START TRANSACTION;
-- Update participations
UPDATE participations p
INNER JOIN users_to_delete u ON p.user_id = u.id
SET p.user_id = 1000000;
COMMIT;

START TRANSACTION;
-- Update excellences
UPDATE excellences e
INNER JOIN users_to_delete u ON e.user_id = u.id
SET e.user_id = 1000000;
COMMIT;

START TRANSACTION;
-- Update model_has_roles
UPDATE model_has_roles m
INNER JOIN users_to_delete u ON m.model_id = u.id
SET m.model_id = 1000000;
COMMIT;

START TRANSACTION;
-- Update leading_teacher_expertise_user
UPDATE leading_teacher_expertise_user l
INNER JOIN users_to_delete u ON l.user_id = u.id
SET l.user_id = 1000000;
COMMIT;

START TRANSACTION;
-- Soft delete the users
UPDATE users u
INNER JOIN users_to_delete d ON u.id = d.id
SET u.deleted_at = '2024-12-13 17:07:24',
    u.updated_at = '2024-12-13 17:07:24';
COMMIT;

-- Delete processed users
DELETE FROM users
WHERE id IN (SELECT id FROM users_to_delete);

-- Clean up
DROP TABLE IF EXISTS users_to_delete;

-- Repeat the process for the next batch by running this script again until no more users are found
