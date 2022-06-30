Create database blogphp;

use blogphp;

CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    admin BOOLEAN DEFAULT false,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    archivedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Posts (
    id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    userId INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    text LONGTEXT,
    imageURL VARCHAR(200),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    archivedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (userId) REFERENCES Users(id)
);

CREATE TABLE Comments (
    id INTEGER NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    postId INTEGER NOT NULL,
    userId INTEGER NOT NULL,
    text LONGTEXT NOT NULL,
    valided BOOLEAN DEFAULT false,
    adminId INTEGER NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    archivedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (userId) REFERENCES Users(id),
    FOREIGN KEY (postId) REFERENCES Posts(id),
    FOREIGN KEY (adminId) REFERENCES Users(id)
);



INSERT INTO `Users` (`pseudo`, `email`, `password`, `admin`)
VALUES
('Ikki', 'ikki@exemple.fr', 'coucou1', true),
('Shun', 'shun@exemple.com', 'coucou2', false),
('Hyoga', 'hyoga@exemple.com', 'coucou3', false);


INSERT INTO `Posts` (`userId`, `title`, `text`, `imageURL`)
VALUES
(1, 'test1', 'Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.', ''),
(1, 'test2', 'Postremo ad id indignitatis est ventum, ut cum peregrini ob formidatam haut ita dudum alimentorum inopiam pellerentur ab urbe praecipites, sectatoribus disciplinarum liberalium inpendio paucis sine respiratione ulla extrusis, tenerentur minimarum adseclae veri, quique id simularunt ad tempus, et tria milia saltatricum ne interpellata quidem cum choris totidemque remanerent magistris.', ''),
(1, 'test3', 'Restabat ut Caesar post haec properaret accitus et abstergendae causa suspicionis sororem suam, eius uxorem, Constantius ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet ambigeret metuens saepe cruentum, spe tamen quod eum lenire poterit ut germanum profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium repentina. cuius post obitum maritus contemplans cecidisse fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', ''),
(1, 'test4', 'Et est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum. Victus universis caro ferina est lactisque abundans copia qua sustentantur, et herbae multiplices et siquae alites capi per aucupium possint, et plerosque mos vidimus frumenti usum et vini penitus ignorantes.', '');

INSERT INTO `Comments` (`userId`, `postId`, `text`, `valided`, `adminId`)
VALUES
(2, 2, 'Et est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.', true, 1),
(3, 2, 'Victus universis caro ferina est lactisque abundans copia qua sustentantur, et herbae multiplices et siquae alites capi per aucupium possint, et plerosque mos vidimus frumenti usum et vini penitus ignorantes.', false, 1);