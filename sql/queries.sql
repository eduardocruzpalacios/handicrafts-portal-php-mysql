/* USERS */

/* mock user */
INSERT INTO
  `users` (`id`, `email`, `password`)
VALUES
  ('admin', 'adming@admin.es', 'Admin+12')

/* login */
SELECT
  id
FROM
  users
WHERE
  users.id = 'admin'
  AND users.password = 'Admin+12';