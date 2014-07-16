hub module
==========

This is an add-on module for emonCMS to view the emonHub installs reporting to emonCMS.

Currently just an experimental proof of concept intending to be developed into a remote interface to view and update emonHub settings etc.


========================================================================================================

The "emoncms_integration" branch of emonhub is required for the hub module to work.
NOTE - This is not the main emonhub repo and it will not work this way if emonhub already installed, rename existing emonhub folder and copy settings if required.

    git clone https://github.com/otherWIP/dev-emonhub.git && dev-emonhub/install.sh
    cd emonhub
    git checkout emoncms_integration
    
This also enables emonHub "myip" integration with emonCMS including emonCMS.org, but only "myip" OR "hub" can be enabled for each dispatcher/emonCMS instance.    

    
=========================================================================================================

To install the hub module, just navigate to emoncms folder and clone module from github.
So if was emonCMS installed using git, run

    cd /var/www/emoncms/Modules
    
or if was emonCMS installed using apt, run
    
    cd /usr/share/emoncms/www/Modules
    
and then clone the hub module using
    
    git clone https://github.com/otherWIP/hub.git
    
Once the module is in place, log into emonCMS, open "admin" tab and "Update & check" database.