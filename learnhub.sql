INSERT INTO category (code, name, parent_code) VALUES
('PROG', 'Programación', NULL),
('WEB', 'Programación Web', 'PROG'),
('BACK', 'Backend', 'WEB'),
('DES', 'Diseño', NULL),
('MARK', 'Marketing', NULL);

INSERT INTO course (id, category_code, title, teacher, description, image, level, slug) VALUES
(1, 'WEB', 'Symfony desde cero', 'Laura Pérez', 'Curso introductorio para crear aplicaciones con Symfony, Doctrine y Twig.', 'https://picsum.photos/seed/symfony/600/350', 'Basico', 'symfony-desde-cero'),
(2, 'BACK', 'API REST con Symfony', 'Carlos Vidal', 'Aprende a crear endpoints JSON y probarlos con un cliente REST.', 'https://picsum.photos/seed/api/600/350', 'Medio', 'api-rest-con-symfony'),
(3, 'DES', 'Diseño UI para dashboards', 'Marta Soler', 'Buenas prácticas para crear paneles claros y fáciles de usar.', 'https://picsum.photos/seed/design/600/350', 'Basico', 'diseno-ui-para-dashboards'),
(4, 'MARK', 'SEO técnico para proyectos web', 'Nuria Campos', 'Conceptos clave para mejorar la visibilidad de una web.', 'https://picsum.photos/seed/seo/600/350', 'Medio', 'seo-tecnico-para-proyectos-web'),
(5, 'BACK', 'Arquitectura avanzada en PHP', 'Javier Ruiz', 'Patrones, servicios y organización de código en aplicaciones grandes.', 'https://picsum.photos/seed/php/600/350', 'Avanzado', 'arquitectura-avanzada-en-php');

INSERT INTO enrollment (course_id, student_name, student_email, status) VALUES
(1, 'Ana García', 'ana@example.com', 'Confirmada'),
(1, 'Pau Ferrer', 'pau@example.com', 'Pendiente'),
(2, 'Lucía Romero', 'lucia@example.com', 'Confirmada'),
(3, 'Marc Torres', 'marc@example.com', 'Cancelada'),
(5, 'Irene Molina', 'irene@example.com', 'Confirmada');