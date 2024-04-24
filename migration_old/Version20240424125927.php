<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424125927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plat_allergen (plat_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_1B562E95D73DB560 (plat_id), INDEX IDX_1B562E956E775A4A (allergen_id), PRIMARY KEY(plat_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plat_allergen ADD CONSTRAINT FK_1B562E95D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plat_allergen ADD CONSTRAINT FK_1B562E956E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu ADD entree_id INT NOT NULL, ADD plat_un_id INT NOT NULL, ADD plat_deux_id INT NOT NULL, ADD plat_trois_id INT DEFAULT NULL, ADD dessert_id INT NOT NULL, CHANGE option_plat option_plat VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93AF7BD910 FOREIGN KEY (entree_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9325E182CC FOREIGN KEY (plat_un_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A933B445268 FOREIGN KEY (plat_deux_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93852C1CB9 FOREIGN KEY (plat_trois_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93745B52FD FOREIGN KEY (dessert_id) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93AF7BD910 ON menu (entree_id)');
        $this->addSql('CREATE INDEX IDX_7D053A9325E182CC ON menu (plat_un_id)');
        $this->addSql('CREATE INDEX IDX_7D053A933B445268 ON menu (plat_deux_id)');
        $this->addSql('CREATE INDEX IDX_7D053A93852C1CB9 ON menu (plat_trois_id)');
        $this->addSql('CREATE INDEX IDX_7D053A93745B52FD ON menu (dessert_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat_allergen DROP FOREIGN KEY FK_1B562E95D73DB560');
        $this->addSql('ALTER TABLE plat_allergen DROP FOREIGN KEY FK_1B562E956E775A4A');
        $this->addSql('DROP TABLE plat_allergen');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93AF7BD910');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9325E182CC');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A933B445268');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93852C1CB9');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93745B52FD');
        $this->addSql('DROP INDEX IDX_7D053A93AF7BD910 ON menu');
        $this->addSql('DROP INDEX IDX_7D053A9325E182CC ON menu');
        $this->addSql('DROP INDEX IDX_7D053A933B445268 ON menu');
        $this->addSql('DROP INDEX IDX_7D053A93852C1CB9 ON menu');
        $this->addSql('DROP INDEX IDX_7D053A93745B52FD ON menu');
        $this->addSql('ALTER TABLE menu DROP entree_id, DROP plat_un_id, DROP plat_deux_id, DROP plat_trois_id, DROP dessert_id, CHANGE option_plat option_plat VARCHAR(255) NOT NULL');
    }
}
