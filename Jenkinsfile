pipeline {
	agent any

	stages {
		stage('Build') {
			steps {
				echo 'Building ...'
				sh 'php --version'
				sh 'cp /var/lib/jenkins/workspace/First_Pipeline_feature_1-env/composer.phar /usr/local/bin/composer'
				sh 'composer install'
				sh './vendor/bin/phing setup'
			}
		}
		stage('Test') {
			steps {
				echo 'Testing ...'
				sh './vendor/bin/phpunit -c module/Application/tests/'
			}
		}
		stage('Deploy') {
			steps {
				echo 'Deploying'
			}
		}
	}
}

