-- Fragment begins: 1 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (1, 'Main', NOW(), 'dbdeploy', '01-create-db.sql');
CREATE DATABASE IF NOT EXISTS pharmagest;
UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 1
	                         AND delta_set = 'Main';
-- Fragment ends: 1 --
