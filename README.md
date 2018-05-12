# abebooks-api

```
$xml = "<AbebookList>
     <Abebook>
     <transactionType>delete</transactionType>
     <vendorBookID>000001</vendorBookID>
     <author>Wittgenstein, Ludwig</author>
     <title>Tractatus Logico-Philosophicus</title>
     <publisher>Dover Publications</publisher>
     <subject>Philosophy Logic Linguistics</subject>
     <price currency=\"USD\">1234567.89</price>
     <dustJacket>true</dustJacket>
     <binding type=\"hard\">Leather</binding>
     <firstEdition>false</firstEdition>
     <signed>false</signed>
     <booksellerCatalogue>Philosophy</booksellerCatalogue>
     <description>Clean and unmarked; with original intro.</description>
     <bookCondition>Fine</bookCondition>
     <size>8.4\" x 5.4\"</size>
     <jacketCondition>Fine</jacketCondition>
     <bookType>Ex\-Library</bookType>
     <isbn>0486404455</isbn>
     <publishPlace>Toronto, Canada, ON</publishPlace>
     <publishYear>1999</publishYear>
     <edition>Reprint</edition>
     <inscriptionType>Signed by previous owner.</inscriptionType>
     <quantity amount=\"2\"></quantity>
     <pictureList>
     <pictureURL>https://www.abebooks.com/images/123456_1.jpg</pictureURL>
     <pictureURL>https://www.abebooks.com/images/123456_2.jpg</pictureURL>
     </pictureList>
     </Abebook>
    </AbebookList>";

$test = new \Abebooks\API\AbebooksAuth('USERNAME', 'KEY');
$method = new \Abebooks\API\Actions\InventoryUpdate(new \Abebooks\API\Actions\InventoryUpdateMethod\BookUpdate());
$processor = new \Abebooks\API\AbebooksProcessor($test, $method);

var_dump($processor->run($xml));
```
