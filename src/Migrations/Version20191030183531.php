<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030183531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE player CHANGE id_team_id id_team_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE num_licence num_licence VARCHAR(255) DEFAULT NULL, CHANGE num_shirt num_shirt INT DEFAULT NULL, CHANGE post post VARCHAR(100) DEFAULT NULL, CHANGE profil_img profil_img VARCHAR(255) DEFAULT NULL, CHANGE nom_phone nom_phone INT DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE weight weight INT DEFAULT NULL, CHANGE is_coach is_coach TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE message CHANGE id_joueur_id id_joueur_id INT DEFAULT NULL, CHANGE id_match_id id_match_id INT DEFAULT NULL, CHANGE message message VARCHAR(255) DEFAULT NULL, CHANGE date_message date_message DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE team CHANGE nb_victory nb_victory INT DEFAULT NULL, CHANGE nb_defeat nb_defeat INT DEFAULT NULL, CHANGE team_logo team_logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE `match` DROP score, DROP player_id_id, CHANGE postponed postponed TINYINT(1) DEFAULT NULL, CHANGE cancelage cancelage TINYINT(1) DEFAULT NULL, CHANGE information information VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` ADD score INT DEFAULT NULL, ADD player_id_id INT NOT NULL, CHANGE postponed postponed TINYINT(1) DEFAULT \'NULL\', CHANGE cancelage cancelage TINYINT(1) DEFAULT \'NULL\', CHANGE information information VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE message CHANGE id_joueur_id id_joueur_id INT DEFAULT NULL, CHANGE id_match_id id_match_id INT DEFAULT NULL, CHANGE message message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_message date_message DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE player CHANGE id_team_id id_team_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE num_licence num_licence VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE num_shirt num_shirt INT DEFAULT NULL, CHANGE post post VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE profil_img profil_img VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_phone nom_phone INT DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE weight weight INT DEFAULT NULL, CHANGE is_coach is_coach TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE team CHANGE nb_victory nb_victory INT DEFAULT NULL, CHANGE nb_defeat nb_defeat INT DEFAULT NULL, CHANGE team_logo team_logo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
