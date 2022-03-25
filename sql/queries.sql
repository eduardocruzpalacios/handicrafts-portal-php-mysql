/* USERS */
/* mock user */
INSERT INTO
  `users` (`id`, `email`, `password`)
VALUES
  ('admin', 'adming@admin.es', 'Admin+12');

/* login */
SELECT
  id
FROM
  users
WHERE
  users.id = 'admin'
  AND users.password = 'Admin+12';

/* HANDICRAFT */
/* mock */
INSERT INTO
  `handicraft` (
    `id`,
    `dateupload`,
    `userid`,
    `title`,
    `description`,
    `fragile`,
    `weight`,
    `imgname`
  )
VALUES
  (
    NULL,
    '2022-03-21',
    'admin',
    'Prueba',
    'Cammpo largo bla bla blaCammpo largo bla bla bla Cammpo largo bla bla bla Cammpo largo bla bla bla ',
    b'1',
    '2.56',
    'mock-img.png'
  );

INSERT INTO
  `handicraft` (
    `id`,
    `dateupload`,
    `userid`,
    `title`,
    `description`,
    `fragile`,
    `weight`,
    `imgname`
  )
VALUES
  (
    NULL,
    '2022-03-22',
    'admin',
    'Prueba not on sale',
    'hello hello hello',
    b'0',
    NULL,
    'mock-img.png'
  );

/* read all */
SELECT
  *
FROM
  `handicraft`;

/* read some */
SELECT
  *
FROM
  handicraft
WHERE
  userid LIKE 'admin';

/* delete */
DELETE FROM
  handicraft
WHERE
  id = 1;