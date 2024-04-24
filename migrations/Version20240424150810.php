<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424150810 extends AbstractMigration
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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat_allergen DROP FOREIGN KEY FK_1B562E95D73DB560');
        $this->addSql('ALTER TABLE plat_allergen DROP FOREIGN KEY FK_1B562E956E775A4A');
        $this->addSql('DROP TABLE plat_allergen');
    }
}
