#spamdope
Fighting back against spam


##Info
Spamdope is inspired by [spampoison](www.spampoison.com) and identifies a _bad crawler_, then keeps on serving fake data for any further requests made to the same server - regardless of the request url - after it is identified as a _spam bot_.
This specific edition is PHP based so the information below will assume you are using popular software stacks associated.
Please visit the [spamdope wiki](https://github.com/CharlSteynberg/spamdope/wiki) for more information on how it works and why.


##Installation
Assuming you have "Allow Aoverrides" enabled in your server config, the supplied _.htaccess_ file will take care of re-routing all requests to the directory index as specified. If you do not like this, please feel free to change as you want it, but also, consult the [spamdope wiki](https://github.com/CharlSteynberg/spamdope/wiki) about why it is done this way.
Just pull the spamdope source into your test server _docroot_ and test as you see fit.
The data is compressed _tar.gz_ SQL, for import into a _mySQL_ database and is in the _src_ folder.


##Configuration
If you already have the spamdope database, then just _ignore_ the _spamdope.tar.gz_ file for quicker clone, or pull.
Change the _cfg/database.json_ details to your own database details.
