CREATE TABLE IF NOT EXISTS /*TABLE_PREFIX*/t_user_market (
    fk_i_user_id INT(10) UNSIGNED NOT NULL,
    s_donation_link TEXT NULL,
    s_profile_pic TEXT NULL,

        PRIMARY KEY(fk_i_user_id),
        FOREIGN KEY (fk_i_user_id) REFERENCES /*TABLE_PREFIX*/t_user (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';

CREATE TABLE IF NOT EXISTS /*TABLE_PREFIX*/t_item_market (
    fk_i_item_id INT(10) UNSIGNED NOT NULL,
    s_file_zip TEXT NULL,
    s_file_link TEXT NULL,
    s_file_version VARCHAR(10) NOT NULL DEFAULT '1.0.0',
    s_github_url TEXT NULL,
    i_downloads INT(10) NOT NULL DEFAULT 0,

        PRIMARY KEY(fk_i_item_id),
        FOREIGN KEY (fk_i_item_id) REFERENCES /*TABLE_PREFIX*/t_item (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
