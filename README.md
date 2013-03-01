conditional-routing-bundle
==========================

Symfony 2 Conditional / Dynamic routes collections Example Bundle

Installation
------------

This repository is not for installation. This is just an example of how you can do the work.

Configuration
-------------

Add similar lines to your config.yml to enable routing loader (do not forget to replace the bundle name with yours) :
  
	ExampleConditionalRoutingBundle:
		resource: .
		type: extra

Change the parameters in both services.xml and the Routing\Loader to match your needs.

Organize your routings .yml files to dynamically load them given your parameters.

Bibliography
------------

Symfony2: dynamically add routes http://php-and-symfony.matthiasnoback.nl/2012/01/symfony2-dynamically-add-routes/
