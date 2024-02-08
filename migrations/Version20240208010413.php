<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208010413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id_id INT DEFAULT NULL, author_id_id INT DEFAULT NULL, answer VARCHAR(255) DEFAULT NULL, score INT DEFAULT NULL, publication_date DATETIME DEFAULT NULL, prefered INT DEFAULT NULL, INDEX IDX_DADD4A254FAF8F53 (question_id_id), INDEX IDX_DADD4A2569CCBE9A (author_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, answer_subject_id_id INT DEFAULT NULL, question_subject_id_id INT DEFAULT NULL, author_id_id INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, publication_date DATETIME NOT NULL, INDEX IDX_9474526C20717AA4 (answer_subject_id_id), INDEX IDX_9474526CF69695C8 (question_subject_id_id), INDEX IDX_9474526C69CCBE9A (author_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `member` (id INT AUTO_INCREMENT NOT NULL, registration_date DATETIME NOT NULL, biography VARCHAR(255) NOT NULL, reputation INT DEFAULT NULL, country VARCHAR(255) NOT NULL, valideted INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, question VARCHAR(255) NOT NULL, country VARCHAR(255) DEFAULT NULL, views INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A254FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A2569CCBE9A FOREIGN KEY (author_id_id) REFERENCES `member` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C20717AA4 FOREIGN KEY (answer_subject_id_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF69695C8 FOREIGN KEY (question_subject_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C69CCBE9A FOREIGN KEY (author_id_id) REFERENCES `member` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A254FAF8F53');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A2569CCBE9A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C20717AA4');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF69695C8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C69CCBE9A');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE `member`');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
