pipeline {
	agent any

	stages {
		stage('Build') {
			steps {
				echo 'Building ...'
				sh 'php -r "copy(\'https://getcomposer.org/installer\', \'composer-setup.php\');"'
				sh 'php -r "if (hash_file(\'sha384\', \'composer-setup.php\') === \'48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5\') { echo \'Installer verified\'; } else { echo \'Installer corrupt\'; unlink(\'composer-setup.php\'); } echo PHP_EOL;"'
				sh 'php composer-setup.php'
				sh 'php -r "unlink(\'composer-setup.php\');"'
				sh 'composer update'
			}
		}
		stage('Test') {
			steps {
				echo 'Testing ...'
			}
		}
		stage('Deploy') {
			steps {
				echo 'Deploying'
			}
		}
	}
}

