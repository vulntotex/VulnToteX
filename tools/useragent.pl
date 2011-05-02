#!/usr/bin/perl
        use LWP::Simple;
        use LWP::UserAgent;
        use HTTP::Request;
$site="http://www.google.com";
 $ua = LWP::UserAgent->new(agent => '<? phpinfo();?>');
            $ua->timeout(7);
            #$ua->env_proxy;
            $response = $ua->get($site);
	    $source= $response->content;
            print $source;

