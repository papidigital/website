# Papi Digital OctoberCMS Theme

## Local Development
Follow these steps to get a local development environment of Papi Digital
up and running.

1. Install [Vagrant](https://www.vagrantup.com/)
2. Install [VirtualBox](https://www.virtualbox.org/)
3. Pull down the repo if you haven't already
4. Ask for a local `.env` file as you'll need it for the next steps
5. Navigate to the project directory using your terminal of choice and execute `vagrant up --provision`
6. Make sure to update your hosts file with the IP address listed in the `Homestead.yaml` file in the root of the project
7. Staying in the project directory, execute `vagrant ssh`; you should now be in the terminal of the vagrant server
8. Execute the following commands in the order they appear
   - `cd code`
   - `php73`
9. October CMS should now be installed and ready to go. Take note of the admin password to login to the backend.
10. Go to `papidigital.local/thebackdoor` in your browser to login. `admin` is the username and the password was generated at the previous step
11. Navigate to the `Settings` page and change the Front-end Theme to Papi Digital
12. Go to `Plugins` and make sure that the `Blog` plugin is installed. You can search for it by typing `Blog` and selecting `Blog by RainLab`
13. Check that the site is working by going to `papidigital.local`
14. If you want to automatically track changes to your SASS files, check the instructions below.
15. To shut down the virtual machine started by vagrant, you can execute `vagrant halt` in the root directory of the project.
16. If you'd like to start the server back up, execute `vagrant up` in the root directory of the project

### Updating the Papi Digital Theme
The theme lives in `/themes/papidigital`. It's using custom layouts for the blog, and carries some static assets with it for some of the pages.

## Production Deployment
The project is deployed to [cloudways.com](https://cloudways.com).

### Config
It is setup to utilize Cloudways' Git integration. This works using a
pull-based system that is not automatic. You can find the controls for
this [here](https://platform.cloudways.com/apps/1630163/deployment).

This project uses environments, and is configured using a `.env` file
that should always be left out of the git repository.

If changes are needed, you can refer to the `.env` already in production.

### Deployment Instructions
1. To properly deploy, make sure to commit/merge your changes to the
`master` branch
2. Use the ["Pull" button in Cloudways](https://platform.cloudways.com/apps/1630163/deployment)
to finish the deployment
3. Run `npm update` and `yarn install` for any node dependencies
4. Run `composer install` for any composer depedency changes

## SCSS / CSS Compilation
This project uses `npm` to compile SCSS files to CSS and watch changes.

To use this functionality, run `npm run dev` in the terminal.

Check the `package.json` file for more configuration.

## Theming/Templating

### OctoberCMS Themes
To learn how to configure this theme, check the [official OctoberCMS documentation](https://octobercms.com/docs/themes/development#customization).

### Twig Templating
OctoberCMS uses Twig for templating. Visit the [official Twig documentation](https://twig.symfony.com/doc/3.x/templates.html) for more info.
