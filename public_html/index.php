<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div style="margin:1em">
<?php
// echo "<h2><a href='links_basicos.php'>Básicos</a> | Específicos</h2>";

$str  = "

Internet #1
	How does the internet work? What is HTTP? Browsers and how they work?
	DNS and how it works? 
	What is Domain Name? 
	What is hosting?

Basic Frontend Knowledge #1
	HTML

OS and general Knowledge #1
	How OSs work in General 
	Process Management 
	Threads and Concurrency


Basic Terminal Commands #1
	grep
	awk
	sed
	lsof
	curl
	wget
	tail
	head
	less
	find
	ssh
	kill


Version control systems #1
	git
	github
	gitlab




Authentication #1
	Cookie Based 
	OAuth
	Basic Authentication
	Token Authentication
	JWT
	OpenID
	SAML




Relational Databases #1
	PostgreSQL 
	MySQL 
	MariaDB 
	MS SQL 
	Oracle
	ORMs
	ACID Transactions 
	N+1 Problem
	Database Normalization 
	Indexes and how they work


Learn about APIs	#1
	REST
	Read Roy Fielding’s Paper
	JSON APIs 
	SOAP
	gRPC
	HATEOAS
	Open API Spec and Swagger 
	Authentication


Python APIs Caching  #1
	CDN 
	Server Side 
	Client Side
	Redis 
	Memcached


Python APIs Testing  #1
	Integration Testing
	Unit Testing 
	Functional Testing



NoSQL Databases #1
	Document MongoDB,
	CouchDB 
	Column DBs
	Cassandra
	Time series InfluxDB,
	TimescaleDB 
	Realtime Firebase
	RethinkDB
	Data Replication 
	Sharding Strategies
	CAP Theorem


Python APIs Web Security Knowledge  #1
	MD5 and why not to use it 
	SHA Family
	scrypt hashing Algorithms
	bcrypt hashing Algorithms
	SSL/TLS
	OWASP Security Risks
    HTTPS
	CORS

Python APIs Build and deploy  #1
	Ci/cd
	Basic Usage of Git

Python APIs Design and Development Principles #1
	Domain Driven Design 
    Test Driven Development
	SOLID 
	KISS 
	YAGNI
	DRY

Python APIs Containerization vs Virtualization #1
	Docker
	rkt 
	LXC


Python APIs Architectural Patterns #1
	Monolithic Apps 
	Microservices
	SOA
	CQRS and Event Sourcing 
	Serverless

Message Brokers #1
	RabbitMQ 
	Kafka

GraphQL #1
	Apollo
	Relay Modern

Web Servers #1
	Nginx
	Apache
	Caddy
	MS IIS

Python APIs Mitigation Strategies	 #1
	
	Graceful Degradation
	Throttling Backpressure
	Loadshifting 
	Circuit Breaker

	Python APIs Building for Scale #1
	Instrumentation
	Monitoring
	Telemetry
	Migration Strategies
	Horizontal vs Vertical Scaling
	

Search Engines #1
	Elasticsearch 
	Solr

Graph Databases APIs 
	Neo4j

WebSockets

";

$linhas = explode("\n", $str);

echo '<meta charset="UTF-8" />';

$discID = 0;
$discAtual = '';
if(isset($_GET['discAtual'])){
	$discAtual = $_REQUEST['discAtual'];
}
$hash = '';

foreach($linhas as $linha){
	$pula = False;
	$ehTitulo = False;

	$linha = trim($linha);
	if(strlen($linha)< 1) continue;

	if(preg_match("/\#([0-9]+)/", $linha, $registros)) {
		$ehTitulo = True;
		$discID = $registros[1];
		$hash = md5($linha);
		$titulo = preg_replace("/\#([0-9]+)/",'', $linha);
		
		echo "<h2><a href='?discAtual=$hash#$hash' name='$hash'>$titulo</a></h2>";
		continue;
	}
	if($discAtual != $hash){
		$pula = True;
	}

	$linha = trim($linha);
	// if(strlen($linha) < 2 or $pula) continue;
	if($discID==0)$discID='';
	echo "<div style='padding-left:40px'>";
	echo "<b>$linha</b><br>";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&nao_resolvidas=true&instituto=54&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QC TCU</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&nao_resolvidas=true&organizadora=2&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QC CESPE</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?&disciplina=$discID&nao_resolvidas=true&modalidade=2&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QCCE</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&resolvidas_erradas=true&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QC Errei</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&resolvidas_erradas=true&organizadora=2&modalidade=2&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QC Errei cespe</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&nao_resolvidas=true&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=$linha'>QC</a> | ";
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?disciplina=$discID&modalidade=2&nao_resolvidas=true&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&nivel_dificuldade=5++4++3+&q=$linha'>QC HARD</a> | ";
	
	// echo "<a target='blank' href='https://www.qconcursos.com/questoes-de-concursos/questoes/search?nao_resolvidas=true&nr=true&sem_anuladas=true&sem_desatualizadas=true&ano_publicacao=2020++2019++2018++2017++2016++2015+&q=\"$linha\"'>QC EXATO</a> | ";
	echo "<a target='blank' href='https://en.wikipedia.org/wiki/$linha'>Wk.EN</a> | ";
	echo "<a target='blank' href='https://pt.wikipedia.org/wiki/$linha'>Wk.PT</a> | ";
	
	if($discID>0) $linha .= " ".$titulo;
	echo "<a target='blank' href='http://www.google.com/search?q=$linha'>Google</a> | ";
	echo "<a target='blank' href='http://www.google.com/search?tbm=bks&q=$linha'>GBooks</a> | ";
	echo "<a target='blank' href='http://www.google.com/search?tbm=isch&q=$linha'>GImagens</a> | ";
	echo "<a target='blank' href='https://www.youtube.com/results?search_query=$linha'>YouTube</a>";
	
	//echo "<a target='blank' href='http://www.google.com/search?q=$linha+sitetecconcursos.com.br'>TEC</a>";
	echo "</div>";
	echo "<hr>";
}


?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-370979-12', 'auto');
  ga('send', 'pageview');

</script>

</div>