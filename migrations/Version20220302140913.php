<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302140913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_chats DROP FOREIGN KEY FK_CA1FBC461A9A7125');
        $this->addSql('ALTER TABLE users_chats DROP FOREIGN KEY FK_CA1FBC46A76ED395');
        $this->addSql('ALTER TABLE users_chats ADD CONSTRAINT FK_CA1FBC461A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_chats ADD CONSTRAINT FK_CA1FBC46A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_chats DROP FOREIGN KEY FK_CA1FBC46A76ED395');
        $this->addSql('ALTER TABLE users_chats DROP FOREIGN KEY FK_CA1FBC461A9A7125');
        $this->addSql('ALTER TABLE users_chats ADD CONSTRAINT FK_CA1FBC46A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE users_chats ADD CONSTRAINT FK_CA1FBC461A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
