phix
====

phix is a general-purpose, easily-extensible command-line tool for PHP. It has the advantage of being framework-agnostic, allowing you to create your own command-line tools today that will not break when you upgrade or switch frameworks.

System-Wide Installation
------------------------

phix should be installed using the [PEAR Installer](http://pear.php.net). This installer is the community's de-facto standard for distributing PHP components.

    sudo pear channel-discover pear.phix-project.org
    sudo pear install --alldeps phix/phix

After installation, you will find phix inside your local PEAR repository, which on Linux systems is normally /usr/share/php.

Documentation
-------------

phix is self-documenting; use 'phix help' to get started.

Development Environment
-----------------------

If you want to patch or enhance this component, you will need to create a suitable development environment. The easiest way to do that is to install phix4componentdev:

    # phix4componentdev
    sudo apt-get install php5-imagick
    sudo pear channel-discover pear.phix-project.org
    sudo pear -D auto_discover=1 install -Ba phix/phix4componentdev

You can then clone the git repository:

    # phix
    git clone git://github.com/stuartherbert/phix.git
