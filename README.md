#spamdope
Fighting back against spam


##Info
Spamdope is inspired by [spampoison](www.spampoison.com) and identifies a _bad crawler_, then keeps on serving believable fake data for any further requests made to the same server - regardless of the request url - after it is identified as a _spam bot_.

This specific edition is PHP based so the information below will assume you are using popular software stacks associated.

Please visit the [spamdope wiki](https://github.com/CharlSteynberg/spamdope/wiki) for more information on how it works and why.


##Installation
Assuming you have "Allow Aoverrides" enabled in your server config, the supplied _.htaccess_ file will take care of re-routing all requests to the directory index as specified. If you do not like this, please feel free to change as you want it, but also, consult the [spamdope wiki](https://github.com/CharlSteynberg/spamdope/wiki) about why it is done this way.
Just pull the spamdope source into your test server _docroot_ and test as you see fit.
The data is compressed _tar.gz_ SQL, for import into a _mySQL_ database and is in the _src_ folder.


##Configuration
If you already have the spamdope database, then just _ignore_ the _spamdope.tar.gz_ file for quicker clone, or pull.
Change the _cfg/database.json_ details to your own database details.
Change the supplied image and CSS to suite you needs, the point is to have it look like a "normal" site to fool the _spam bots_ to make it _harder_ for the _spam bot_ programmer to identify the given information as "fake".
Also, please note that making larger lists of data served increases chances of being identified as "fake" data, so try to keep it as close to a "real" site as possible, where usually you will not find thousands of names and email- addresses on one page.  Refer to the wiki for more info ;)


##Thank You
By using this you are contributing to fight back against spam, by feeding spammers with "believable" fake information that points to _eccessive spam rated_ and _black listed_ domain names, effectively giving them the chance to spam each other and rendering large portions of their data useless. This results in _fake lead_ generation and discourages bulk advertising organizations to buy _leads_ from useless data sources.

Please feel free to modify the code, suggest changes, etc...
`reminds me of the inspiration one bum-cheek gave the other: "together we can stop this sh!t"`
