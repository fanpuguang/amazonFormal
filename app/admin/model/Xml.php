<?php
namespace app\admin\model;
use think\Model;
use think\Db;
vendor("MarketplaceWebService.Client");
vendor("MarketplaceWebService.Model.StatusList");
vendor("MarketplaceWebService.Model.IdList");
vendor("MarketplaceWebService.Model.GetFeedSubmissionResultRequest");
vendor("MarketplaceWebService.Model.GetFeedSubmissionListRequest");
vendor("MarketplaceWebService.Model.SubmitFeedRequest");
class Xml extends Model

{
    public function type1LocalXml($data,$ItemTypeName,$node_id,$template,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $Header = $dom->createElement('Header');
        $DocumentVersion = $dom->createElement('DocumentVersion');
        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $dom->appendChild($AmazonEnvelope);
        $AmazonEnvelope->appendChild($Header);
        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Product");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $Header->appendChild($DocumentVersion);
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($MerchantIdentifier);
        $text = $dom->createTextNode($identifier);
        $MerchantIdentifier->appendChild($text);
        $ID = 1;
        foreach ($data as $key => $value) {
            $message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($ID);
            $ID++;
            $MessageID->appendChild($text);
            $message->appendChild($MessageID);
            $OperationType = $dom->createElement('OperationType');
            $text = $dom->createTextNode("Update");
            $OperationType->appendChild($text);
            $message->appendChild($OperationType);

            $Product = $dom->createElement('Product');
            $message->appendChild($Product);

            $SKU = $dom->createElement('SKU');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['SKU']);
            }else{
                $text = $dom->createTextNode($value['goodsSku']);
            }

            $SKU->appendChild($text);
            $Product->appendChild($SKU);

            $StandardProductID = $dom->createElement('StandardProductID');
            $Product->appendChild($StandardProductID);

            $Type = $dom->createElement('Type');
            $text = $dom->createTextNode("EAN");
            $Type->appendChild($text);
            $StandardProductID->appendChild($Type);

            $Value = $dom->createElement('Value');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['UPC']);
            }else{
                $text = $dom->createTextNode($value['upc']);
            }
            $Value->appendChild($text);
            $StandardProductID->appendChild($Value);

            $DescriptionData = $dom->createElement('DescriptionData');
            $Product->appendChild($DescriptionData);

            $Title = $dom->createElement('Title');
            $text = $dom->createTextNode($value['TITLE']);
            $Title->appendChild($text);
            $DescriptionData->appendChild($Title);

            $Brand = $dom->createElement('Brand');
            $text = $dom->createTextNode($value['goodsBrandName']);
            $Brand->appendChild($text);
            $DescriptionData->appendChild($Brand);

            $Description = $dom->createElement('Description');
            $text = $dom->createCDATASection($value['DESCRIPTION']);
            $Description->appendChild($text);
            $DescriptionData->appendChild($Description);
            if($value['MAIN_POINTS_1']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_1']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_2']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_2']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_3']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_3']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_4']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_4']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_5']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_5']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }

            $Manufacturer = $dom->createElement('Manufacturer');
            $text = $dom->createTextNode($value['goodsTradeNames']);
            $Manufacturer->appendChild($text);
            $DescriptionData->appendChild($Manufacturer);

            $SearchTerms = $dom->createElement('SearchTerms');
            $text = $dom->createTextNode($value['key_words']);
            $SearchTerms->appendChild($text);
            $DescriptionData->appendChild($SearchTerms);

            $ItemType = $dom->createElement('ItemType');
            $text = $dom->createTextNode($ItemTypeName);
            // $text = $dom->createTextNode($value['ItemType']);
            $ItemType->appendChild($text);
            $DescriptionData->appendChild($ItemType);

            
            $RecommendedBrowseNode = $dom->createElement('RecommendedBrowseNode');
            $text = $dom->createTextNode($node_id);
            $RecommendedBrowseNode->appendChild($text);
            $DescriptionData->appendChild($RecommendedBrowseNode);
                $ProductData = $dom->createElement('ProductData');
                $Product->appendChild($ProductData);

//                $Health = $dom->createElement($template[0]);
//                $ProductData->appendChild($Health);
//                $ProductType = $dom->createElement('ProductType');
//                $Health->appendChild($ProductType);
//                $category = $dom->createElement($template[1]);
//                $ProductType->appendChild($category);

                $Home = $dom->createElement($template[0]);
                $ProductData->appendChild($Home);
                $ProductType = $dom->createElement('ProductType');
                $Home->appendChild($ProductType);
                $category = $dom->createElement($template[1]);
                $ProductType->appendChild($category);


                $VariationData = $dom->createElement('VariationData');
                $category->appendChild($VariationData);

                $Parentage = $dom->createElement('Parentage');
                if(isset($value['SKU'])){
                    $ParentageText ="child";
                }else{
                    $ParentageText ="parent";
                }
                $text = $dom->createTextNode($ParentageText);
                $Parentage->appendChild($text);
                $VariationData->appendChild($Parentage);

            if($value['childType']>0){
                $VariationTheme = $dom->createElement('VariationTheme');
                if($value['childType'] ==1){
                    $VariationThemeText = "Color";
                }elseif($value['childType'] ==2){
                    $VariationThemeText = "Size";
                }elseif($value['childType'] ==3){
                    $VariationThemeText = "Size-Color";
                }
                $text = $dom->createTextNode($VariationThemeText);
                $VariationTheme->appendChild($text);
                $VariationData->appendChild($VariationTheme);
                if(isset($value['SKU'])){

                    if($value['childType'] ==1){
                        $html = 'Color';
                        $label = "Color";
                        $labelVlue = $value['color'];
                    }elseif($value['childType'] ==2){
                        $html = 'Size';
                        $label = "Size";
                        $labelVlue = $value['size'];
                    }elseif($value['childType'] ==3){
                        $html = 'Size-Color';
                        $label1 = 'Size';
                        $label2 = "Color";
                        $labelVlue1 = $value['size'];
                        $labelVlue2 = $value['color'];
                    }


                    if($value['childType'] ==3){
                        $tag1 = $dom->createElement($label1);
                        $text = $dom->createTextNode($labelVlue1);
                        $tag1->appendChild($text);
                        $VariationData->appendChild($tag1);

                        $tag2 = $dom->createElement($label2);
                        $text = $dom->createTextNode($labelVlue2);
                        $tag2->appendChild($text);
                        $VariationData->appendChild($tag2);
                    }else{
                        $tag = $dom->createElement($label);
                        $text = $dom->createTextNode($labelVlue);
                        $tag->appendChild($text);
                        $VariationData->appendChild($tag);
                    }

                }
                


            }
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."1.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function homeLocalXml($data,$ItemTypeName,$node_id,$template,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $Header = $dom->createElement('Header');
        $DocumentVersion = $dom->createElement('DocumentVersion');
        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $dom->appendChild($AmazonEnvelope);
        $AmazonEnvelope->appendChild($Header);
        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Product");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $Header->appendChild($DocumentVersion);
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($MerchantIdentifier);
        $text = $dom->createTextNode($identifier);
        $MerchantIdentifier->appendChild($text);
        $ID = 1;
        foreach ($data as $key => $value) {
            $message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($ID);
            $ID++;
            $MessageID->appendChild($text);
            $message->appendChild($MessageID);
            $OperationType = $dom->createElement('OperationType');
            $text = $dom->createTextNode("Update");
            $OperationType->appendChild($text);
            $message->appendChild($OperationType);

            $Product = $dom->createElement('Product');
            $message->appendChild($Product);

            $SKU = $dom->createElement('SKU');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['SKU']);
            }else{
                $text = $dom->createTextNode($value['goodsSku']);
            }

            $SKU->appendChild($text);
            $Product->appendChild($SKU);

            $StandardProductID = $dom->createElement('StandardProductID');
            $Product->appendChild($StandardProductID);

            $Type = $dom->createElement('Type');
            $text = $dom->createTextNode("EAN");
            $Type->appendChild($text);
            $StandardProductID->appendChild($Type);

            $Value = $dom->createElement('Value');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['UPC']);
            }else{
                $text = $dom->createTextNode($value['upc']);
            }
            $Value->appendChild($text);
            $StandardProductID->appendChild($Value);

            $DescriptionData = $dom->createElement('DescriptionData');
            $Product->appendChild($DescriptionData);

            $Title = $dom->createElement('Title');
            $text = $dom->createTextNode($value['TITLE']);
            $Title->appendChild($text);
            $DescriptionData->appendChild($Title);

            $Brand = $dom->createElement('Brand');
            $text = $dom->createTextNode($value['goodsBrandName']);
            $Brand->appendChild($text);
            $DescriptionData->appendChild($Brand);

            $Description = $dom->createElement('Description');
            $text = $dom->createCDATASection($value['DESCRIPTION']);
            // $text = $dom->createTextNode($value['DESCRIPTION']);
            // $str =  "&amp;lt[CDATA[".$value['DESCRIPTION']."]]&amp;gt";
            
            // $text = $dom->createTextNode($str);
            $Description->appendChild($text);
            $DescriptionData->appendChild($Description);
            if($value['MAIN_POINTS_1']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_1']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_2']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_2']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_3']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_3']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_4']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_4']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }
            if($value['MAIN_POINTS_5']!=""){
                $BulletPoint = $dom->createElement('BulletPoint');
                $text = $dom->createTextNode($value['MAIN_POINTS_5']);
                $BulletPoint->appendChild($text);
                $DescriptionData->appendChild($BulletPoint);
            }

            $Manufacturer = $dom->createElement('Manufacturer');
            $text = $dom->createTextNode($value['goodsTradeNames']);
            $Manufacturer->appendChild($text);
            $DescriptionData->appendChild($Manufacturer);

            $SearchTerms = $dom->createElement('SearchTerms');
            $text = $dom->createTextNode($value['key_words']);
            $SearchTerms->appendChild($text);
            $DescriptionData->appendChild($SearchTerms);

            $ItemType = $dom->createElement('ItemType');
            $text = $dom->createTextNode($ItemTypeName);
            // $text = $dom->createTextNode($value['ItemType']);
            $ItemType->appendChild($text);
            $DescriptionData->appendChild($ItemType);

            
            $RecommendedBrowseNode = $dom->createElement('RecommendedBrowseNode');
            $text = $dom->createTextNode($node_id);
            $RecommendedBrowseNode->appendChild($text);
            $DescriptionData->appendChild($RecommendedBrowseNode);
                $ProductData = $dom->createElement('ProductData');
                $Product->appendChild($ProductData);

                $Home = $dom->createElement('Home');
                $ProductData->appendChild($Home);
                $ProductType = $dom->createElement('ProductType');
                $Home->appendChild($ProductType);
                $category = $dom->createElement($template);
                $ProductType->appendChild($category);

                $VariationData = $dom->createElement('VariationData');
                $category->appendChild($VariationData);

            if($value['childType']>0){
                $VariationTheme = $dom->createElement('VariationTheme');
                if($value['childType'] ==1){
                    $VariationThemeText = "Color";
                }elseif($value['childType'] ==2){
                    $VariationThemeText = "Size";
                }elseif($value['childType'] ==3){
                    $VariationThemeText = "Size-Color";
                }
                $text = $dom->createTextNode($VariationThemeText);
                $VariationTheme->appendChild($text);
                $VariationData->appendChild($VariationTheme);
                if(isset($value['SKU'])){
                    if($value['childType'] ==1){
                        $html = 'Color';
                        $label = "Color";
                        $labelVlue = $value['color'];
                    }elseif($value['childType'] ==2){
                        $html = 'Size';
                        $label = "Size";
                        $labelVlue = $value['size'];
                    }elseif($value['childType'] ==3){
                        $html = 'Size-Color';
                        $label1 = 'Size';
                        $label2 = "Color";
                        $labelVlue1 = $value['size'];
                        $labelVlue2 = $value['color'];
                    }

                    // $text = $dom->createTextNode($html);
                    // $VariationTheme->appendChild($text);
                    // $VariationData->appendChild($VariationTheme);

                    if($value['childType'] ==3){
                        $tag1 = $dom->createElement($label1);
                        $text = $dom->createTextNode($labelVlue1);
                        $tag1->appendChild($text);
                        $VariationData->appendChild($tag1);

                        $tag2 = $dom->createElement($label2);
                        $text = $dom->createTextNode($labelVlue2);
                        $tag2->appendChild($text);
                        $VariationData->appendChild($tag2);
                    }else{
                        $tag = $dom->createElement($label);
                        $text = $dom->createTextNode($labelVlue);
                        $tag->appendChild($text);
                        $VariationData->appendChild($tag);
                    }

                }
                
                $Parentage = $dom->createElement('Parentage');
                if(isset($value['SKU'])){
                    $ParentageText ="child";
                }else{
                    $ParentageText ="parent";
                }
                $text = $dom->createTextNode($ParentageText);
                $Parentage->appendChild($text);
                $Home->appendChild($Parentage);

            }
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."1.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function homeXml($data,$template,$userData){
        // return 11;die;
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $Header = $dom->createElement('Header');
        $DocumentVersion = $dom->createElement('DocumentVersion');
        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $dom->appendChild($AmazonEnvelope);
        $AmazonEnvelope->appendChild($Header);
        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Product");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $Header->appendChild($DocumentVersion);
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($MerchantIdentifier);
        // $text = $dom->createTextNode("OBD-HotSales");
        $text = $dom->createTextNode($userData['MerchantIdentifier']);
        $MerchantIdentifier->appendChild($text);
        $ID = 1;
        foreach ($data as $key => $value) {
            // return $value['COLOR'];die;
            $message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($ID);
            $ID++;
            $MessageID->appendChild($text);
            $message->appendChild($MessageID);
            $OperationType = $dom->createElement('OperationType');
            $text = $dom->createTextNode("Update");
            $OperationType->appendChild($text);
            $message->appendChild($OperationType);

            $Product = $dom->createElement('Product');
            $message->appendChild($Product);

            $SKU = $dom->createElement('SKU');
            if(isset($value['Parentage'])){
                if($value['Parentage'] =="parent"){
                    $text = $dom->createTextNode($value['FSKU']);
                }elseif($value['Parentage'] =="child"){
                    $text = $dom->createTextNode($value['CSKU']);
                }
            }else{
                $text = $dom->createTextNode($value['FSKU']);
            }

            $SKU->appendChild($text);
            $Product->appendChild($SKU);

            $StandardProductID = $dom->createElement('StandardProductID');
            $Product->appendChild($StandardProductID);

            $Type = $dom->createElement('Type');
            $text = $dom->createTextNode("EAN");
            $Type->appendChild($text);
            $StandardProductID->appendChild($Type);

            $Value = $dom->createElement('Value');
            $text = $dom->createTextNode($value['UPC']);
            // $text = $dom->createTextNode($value['EAN']);
            $Value->appendChild($text);
            $StandardProductID->appendChild($Value);

            $DescriptionData = $dom->createElement('DescriptionData');
            $Product->appendChild($DescriptionData);

            $Title = $dom->createElement('Title');
            $text = $dom->createTextNode($value['TITLE']);
            $Title->appendChild($text);
            $DescriptionData->appendChild($Title);

            $Brand = $dom->createElement('Brand');
            $text = $dom->createTextNode($userData['BRAND']);
            $Brand->appendChild($text);
            $DescriptionData->appendChild($Brand);

            $Description = $dom->createElement('Description');
            // $Description = $dom->$dom->createCDATASection('Description');
            // $str =  "<![CDATA[".$value['DESCRIPTION']."]]>";
            $text = $dom->createCDATASection($value['DESCRIPTION']);
            // $changeHTML = $this->changeHTML($value['DESCRIPTION']);
            // $desc = strip_tags($value['DESCRIPTION']);
            // $text = $dom->createTextNode($value['DESCRIPTION']);
            // $text = $dom->createTextNode($desc);
            // $text = $dom->createTextNode($str);
            $Description->appendChild($text);
            $DescriptionData->appendChild($Description);

            $BulletPoint = $dom->createElement('BulletPoint');
            $text = $dom->createTextNode($value['MAIN_POINTS_1']);
            $BulletPoint->appendChild($text);
            $DescriptionData->appendChild($BulletPoint);

            $BulletPoint = $dom->createElement('BulletPoint');
            $text = $dom->createTextNode($value['MAIN_POINTS_2']);
            $BulletPoint->appendChild($text);
            $DescriptionData->appendChild($BulletPoint);

            $BulletPoint = $dom->createElement('BulletPoint');
            $text = $dom->createTextNode($value['MAIN_POINTS_3']);
            $BulletPoint->appendChild($text);
            $DescriptionData->appendChild($BulletPoint);

            $BulletPoint = $dom->createElement('BulletPoint');
            $text = $dom->createTextNode($value['MAIN_POINTS_4']);
            $BulletPoint->appendChild($text);
            $DescriptionData->appendChild($BulletPoint);

            $BulletPoint = $dom->createElement('BulletPoint');
            $text = $dom->createTextNode($value['MAIN_POINTS_5']);
            $BulletPoint->appendChild($text);
            $DescriptionData->appendChild($BulletPoint);


            $Manufacturer = $dom->createElement('Manufacturer');
            $text = $dom->createTextNode($userData['Manufacturer']);
            $Manufacturer->appendChild($text);
            $DescriptionData->appendChild($Manufacturer);

            $SearchTerms = $dom->createElement('SearchTerms');
            $text = $dom->createTextNode($value['keyword']);
            $SearchTerms->appendChild($text);
            $DescriptionData->appendChild($SearchTerms);

            $ItemType = $dom->createElement('ItemType');
            $text = $dom->createTextNode($userData['ItemType']);
            // $text = $dom->createTextNode($value['ItemType']);
            $ItemType->appendChild($text);
            $DescriptionData->appendChild($ItemType);

            
            $RecommendedBrowseNode = $dom->createElement('RecommendedBrowseNode');
            $text = $dom->createTextNode($userData['RecommendedBrowseNode']);
            $RecommendedBrowseNode->appendChild($text);
            $DescriptionData->appendChild($RecommendedBrowseNode);
            $ProductData = $dom->createElement('ProductData');
            $Product->appendChild($ProductData);

            $Home = $dom->createElement('Home');
            $ProductData->appendChild($Home);
            // if(isset($value['Parentage'])){
                    $ProductType = $dom->createElement('ProductType');
                    $Home->appendChild($ProductType);
                    $category = $dom->createElement($template[1]);
                    $ProductType->appendChild($category);

                    $VariationData = $dom->createElement('VariationData');
                    $category->appendChild($VariationData);
                if($value['SIZE'] || $value['COLOR']){
                    $VariationTheme = $dom->createElement('VariationTheme');
                    if(isset($value['Parentage']) && $value['Parentage'] == "parent"){
                        $text = $dom->createTextNode($value['VariationTheme']);
                        $VariationTheme->appendChild($text);
                        $VariationData->appendChild($VariationTheme);
                    // }elseif($value['Parentage'] =="child"){
                    }else{
                        if($value['SIZE'] && $value['COLOR']){
                            $html = 'Size-Color';
                            $label1 = 'Size';
                            $label2 = "Color";
                            $labelVlue1 = $value['SIZE'];
                            $labelVlue2 = $value['COLOR'];
                        }
                        if($value['SIZE'] && $value['COLOR']==""){
                            $html = 'Size';
                            $label = "Size";
                            $labelVlue = $value['SIZE'];
                        }
                        if($value['SIZE']=="" && $value['COLOR']){
                            $html = 'Color';
                            $label = "Color";
                            $labelVlue = $value['COLOR'];
                            // $labelVlue = 11111;
                        }
                        if($value['SIZE']!="" || $value['COLOR']!=""){
                            $text = $dom->createTextNode($html);
                            $VariationTheme->appendChild($text);
                            $VariationData->appendChild($VariationTheme);
                        }

                        if($value['SIZE'] && $value['COLOR']) {
                            $tag1 = $dom->createElement($label1);
                            $text = $dom->createTextNode($labelVlue1);
                            $tag1->appendChild($text);
                            $VariationData->appendChild($tag1);

                            $tag2 = $dom->createElement($label2);
                            $text = $dom->createTextNode($labelVlue2);
                            $tag2->appendChild($text);
                            $VariationData->appendChild($tag2);
                        }else{
                            $tag = $dom->createElement($label);
                            $text = $dom->createTextNode($labelVlue);
                            $tag->appendChild($text);
                            $VariationData->appendChild($tag);
                        }

                    }

            if(isset($value['Parentage'])){
                    $Parentage = $dom->createElement('Parentage');
                    $text = $dom->createTextNode($value['Parentage']);
                    $Parentage->appendChild($text);
                    $Home->appendChild($Parentage);
            }

        }
        }

//        }
//        $res = $dom->save('./public/xml/product.xml');
//        return $res;
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."1.xml";
        $dom->save($xmlName);
       //echo $xmlName;
        return $xmlName;
    }
    public function priceLocalXml($data,$country,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $BaseCurrency = ['japan'=>'JPY','germany'=>'EUR','britain'=>'GBP','italy'=>'EUR','france'=>'EUR','spain'=>'EUR','usa'=>'USD','mexico'=>'MXN','canada'=>'CAD'];
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($identifier);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Price");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);

        foreach ($data as $key => $value) {
            $Message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($Message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($key+1);
            $MessageID->appendChild($text);
            $Message->appendChild($MessageID);

            $Price = $dom->createElement('Price');
            $Message->appendChild($Price);


            $SKU = $dom->createElement('SKU');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['SKU']);
            }else{
                $text = $dom->createTextNode($value['goodsSku']);
            }
            $SKU->appendChild($text);
            $Price->appendChild($SKU);

            $StandardPrice = $dom->createElement('StandardPrice');
            $currency = $BaseCurrency[$country];
            $countryPrice = $country."_price";
            // dump($country);die;
            $StandardPrice->setAttribute('currency',$currency);
            $BUY_PRICE = round($value[$countryPrice],2);
            $text = $dom->createTextNode($BUY_PRICE);
            $StandardPrice->appendChild($text);
            $Price->appendChild($StandardPrice);
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."2.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function priceXml($data,$country,$userData){
        $dom = new \DOMDocument('1.0', 'utf8');
         $BaseCurrency = ['japan'=>'JPY','germany'=>'EUR','britain'=>'GBP','italy'=>'EUR','france'=>'EUR','spain'=>'EUR','usa'=>'USD','mexico'=>'MXN','canada'=>'CAD'];
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($userData['MerchantIdentifier']);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Price");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);

        foreach ($data as $key => $value) {
            $Message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($Message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($key+1);
            $MessageID->appendChild($text);
            $Message->appendChild($MessageID);

            $Price = $dom->createElement('Price');
            $Message->appendChild($Price);

            $SKU = $dom->createElement('SKU');

            if(isset($value['Parentage'])){
                if($value['Parentage'] =="parent"){
                    $text = $dom->createTextNode($value['FSKU']);
                }elseif($value['Parentage'] =="child"){
                    $text = $dom->createTextNode($value['CSKU']);
                }
            }else{
                $text = $dom->createTextNode($value['FSKU']);
            }

            // $text = $dom->createTextNode($value['CSKU']);
            $SKU->appendChild($text);
            $Price->appendChild($SKU);

            $StandardPrice = $dom->createElement('StandardPrice');
            $currency = $BaseCurrency[$country];
            $StandardPrice->setAttribute('currency',$currency);
            // $BUY_PRICE = round($value['BUY_PRICE'],2);
            $text = $dom->createTextNode($value['price']);
            $StandardPrice->appendChild($text);
            $Price->appendChild($StandardPrice);
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."2.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function imgLocalXml($data,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);
        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);
        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($identifier);
        // $text = $dom->createTextNode("OBD-HotSales");
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("ProductImage");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $messageCount = 1;
        $imgTitle = [1=>'Main',2=>'PT1',3=>'PT2',4=>'PT3',5=>'PT4',6=>'PT5',7=>'PT6',8=>'PT7',9=>'PT8',10=>'Search',11=>'PM01'];
        foreach ($data as $key => $value) {
            if(isset($value['SKU'])){
                $picture = rtrim($value['imgs'],",");;
            }else{
                 $picture = $value['goodsImages'];
            }
            $pictureArray = explode(",",$picture);
            if(count($pictureArray)>1){
                foreach ($pictureArray as $k=>$v){
                    if($k>6){
                        break;
                    }else{
                        $message = $dom->createElement('Message');
                        $AmazonEnvelope->appendChild($message);

                        $MessageID = $dom->createElement('MessageID');
                        $text = $dom->createTextNode($messageCount);
                        $MessageID->appendChild($text);
                        $message->appendChild($MessageID);

                        $OperationType = $dom->createElement('OperationType');
                        $text = $dom->createTextNode("Update");
                        $OperationType->appendChild($text);
                        $message->appendChild($OperationType);

                        $ProductImage = $dom->createElement('ProductImage');
                        $message->appendChild($ProductImage);

                        $SKU = $dom->createElement('SKU');
                        if(isset($value['SKU'])){
                            $text = $dom->createTextNode($value['SKU']);
                        }else{
                             $text = $dom->createTextNode($value['goodsSku']);
                        }
                        $SKU->appendChild($text);
                        $ProductImage->appendChild($SKU);

                        $ImageType = $dom->createElement('ImageType');
                        $text = $dom->createTextNode($imgTitle[$k+1]);
                        $ImageType->appendChild($text);
                        $ProductImage->appendChild($ImageType);

                        $ImageLocation = $dom->createElement('ImageLocation');
                        $text = $dom->createTextNode($v);
                        $ImageLocation->appendChild($text);
                        $ProductImage->appendChild($ImageLocation);
                        $messageCount++;
                    }

                }
            }else{
                continue;
            }



        }
//        $res = $dom->save('./public/xml/img.xml');
//        return $res;
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."3.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function imgXml($data,$userData){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);
        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);
        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($userData['MerchantIdentifier']);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("ProductImage");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $messageCount = 1;
        $imgTitle = [1=>'Main',2=>'PT1',3=>'PT2',4=>'PT3',5=>'PT4',6=>'PT5',7=>'PT6',8=>'PT7',9=>'PT8',10=>'Search',11=>'PM01'];
        foreach ($data as $key => $value) {
            $pictureArray = explode("|",$value['PRICE_LIST']);
            if(count($pictureArray)>1){
                foreach ($pictureArray as $k=>$v){
                    if($k>6){
                        break;
                    }else{
                        $message = $dom->createElement('Message');
                        $AmazonEnvelope->appendChild($message);

                        $MessageID = $dom->createElement('MessageID');
                        $text = $dom->createTextNode($messageCount);
                        $MessageID->appendChild($text);
                        $message->appendChild($MessageID);

                        $OperationType = $dom->createElement('OperationType');
                        $text = $dom->createTextNode("Update");
                        $OperationType->appendChild($text);
                        $message->appendChild($OperationType);

                        $ProductImage = $dom->createElement('ProductImage');
                        $message->appendChild($ProductImage);

                        $SKU = $dom->createElement('SKU');
                         if(isset($value['Parentage'])){
                            if($value['Parentage'] =="parent"){
                                $text = $dom->createTextNode($value['FSKU']);
                            }elseif($value['Parentage'] =="child"){
                                $text = $dom->createTextNode($value['CSKU']);
                            }
                        }else{
                            $text = $dom->createTextNode($value['FSKU']);
                        }
                        $SKU->appendChild($text);
                        $ProductImage->appendChild($SKU);

                        $ImageType = $dom->createElement('ImageType');
                        $text = $dom->createTextNode($imgTitle[$k+1]);
                        $ImageType->appendChild($text);
                        $ProductImage->appendChild($ImageType);

                        $ImageLocation = $dom->createElement('ImageLocation');
                        $text = $dom->createTextNode($v);
                        $ImageLocation->appendChild($text);
                        $ProductImage->appendChild($ImageLocation);
                        $messageCount++;
                    }

                }
            }else{
                continue;
            }



        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."3.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
     public function inventoryLocalXml($data,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($identifier);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Inventory");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $ID = 1;
        foreach ($data as $key => $value) {
            $Message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($Message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($ID);
            $ID++;
            $MessageID->appendChild($text);
            $Message->appendChild($MessageID);

            $OperationType = $dom->createElement('OperationType');
            $text = $dom->createTextNode("Update");
            $OperationType->appendChild($text);
            $Message->appendChild($OperationType);

            $Inventory = $dom->createElement('Inventory');
            $Message->appendChild($Inventory);

            $SKU = $dom->createElement('SKU');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['SKU']);
            }else{
                 $text = $dom->createTextNode($value['goodsSku']);
            }
            $SKU->appendChild($text);
            $Inventory->appendChild($SKU);

            $FulfillmentCenterID = $dom->createElement('FulfillmentCenterID');
            $text = $dom->createTextNode("DEFAULT");
            $FulfillmentCenterID->appendChild($text);
            $Inventory->appendChild($FulfillmentCenterID);

            $Quantity = $dom->createElement('Quantity');
            if(isset($value['SKU'])){
                $text = $dom->createTextNode($value['stock']);
            }else{
                 $text = $dom->createTextNode($value['goodsInventory']);
            }
            $Quantity->appendChild($text);
            $Inventory->appendChild($Quantity);

            $SwitchFulfillmentTo = $dom->createElement('SwitchFulfillmentTo');
            $text = $dom->createTextNode("MFN");
            $SwitchFulfillmentTo->appendChild($text);
            $Inventory->appendChild($SwitchFulfillmentTo);
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."4.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function inventoryXml($data,$userData){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($userData['MerchantIdentifier']);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Inventory");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);
        $ID = 1;
        foreach ($data as $key => $value) {
            $Message = $dom->createElement('Message');
            $AmazonEnvelope->appendChild($Message);

            $MessageID = $dom->createElement('MessageID');
            $text = $dom->createTextNode($ID);
            $ID++;
            $MessageID->appendChild($text);
            $Message->appendChild($MessageID);

            $OperationType = $dom->createElement('OperationType');
            $text = $dom->createTextNode("Update");
            $OperationType->appendChild($text);
            $Message->appendChild($OperationType);

            $Inventory = $dom->createElement('Inventory');
            $Message->appendChild($Inventory);

            $SKU = $dom->createElement('SKU');

             if(isset($value['Parentage'])){
                if($value['Parentage'] =="parent"){
                    $text = $dom->createTextNode($value['FSKU']);
                }elseif($value['Parentage'] =="child"){
                    $text = $dom->createTextNode($value['CSKU']);
                }
            }else{
                $text = $dom->createTextNode($value['FSKU']);
            }
            
            $SKU->appendChild($text);
            $Inventory->appendChild($SKU);

            $FulfillmentCenterID = $dom->createElement('FulfillmentCenterID');
            $text = $dom->createTextNode("DEFAULT");
            $FulfillmentCenterID->appendChild($text);
            $Inventory->appendChild($FulfillmentCenterID);

            $Quantity = $dom->createElement('Quantity');
            $rand = rand(50,200);
            $text = $dom->createTextNode($rand);
            $Quantity->appendChild($text);
            $Inventory->appendChild($Quantity);

            $SwitchFulfillmentTo = $dom->createElement('SwitchFulfillmentTo');
            $text = $dom->createTextNode("MFN");
            $SwitchFulfillmentTo->appendChild($text);
            $Inventory->appendChild($SwitchFulfillmentTo);
        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."4.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function RelationshipsLocalXml($data,$identifier){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($identifier);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Relationship");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);

        $PurgeAndReplace = $dom->createElement('PurgeAndReplace');
        $text = $dom->createTextNode("false");
        $PurgeAndReplace->appendChild($text);
        $AmazonEnvelope->appendChild($PurgeAndReplace);
        $ID = 1;
        foreach ($data as $key => $value) {
            if(isset($value['childSku'])){
                $Message = $dom->createElement('Message');
                $AmazonEnvelope->appendChild($Message);

                $MessageID = $dom->createElement('MessageID');
                $text = $dom->createTextNode($ID);
                $ID++;
                $MessageID->appendChild($text);
                $Message->appendChild($MessageID);

                $OperationType = $dom->createElement('OperationType');
                $text = $dom->createTextNode("Update");
                $OperationType->appendChild($text);
                $Message->appendChild($OperationType);

                $Relationship = $dom->createElement('Relationship');
                $Message->appendChild($Relationship);

                $ParentSKU = $dom->createElement('ParentSKU');
                $text = $dom->createTextNode($value['goodsSku']);
                $ParentSKU->appendChild($text);
                $Relationship->appendChild($ParentSKU);

                foreach ($value['childSku'] as $k=> $v) {
                    $Relation = $dom->createElement('Relation');
                    $Relationship->appendChild($Relation);

                    $SKU = $dom->createElement('SKU');
                    $text = $dom->createTextNode($v);
                    $SKU->appendChild($text);
                    $Relation->appendChild($SKU);

                    $Type = $dom->createElement('Type');
                    $text = $dom->createTextNode("Variation");
                    $Type->appendChild($text);
                    $Relation->appendChild($Type);

                }
            }else{
                continue;
            }

        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."5.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
    public function RelationshipsXml($data,$userData){
        $dom = new \DOMDocument('1.0', 'utf8');
        $dom->formatOutput = true;
        $AmazonEnvelope = $dom->createElement('AmazonEnvelope');
        $dom->appendChild($AmazonEnvelope);

        $Header = $dom->createElement('Header');
        $AmazonEnvelope->appendChild($Header);

        $DocumentVersion = $dom->createElement('DocumentVersion');
        $text = $dom->createTextNode("1.01");
        $DocumentVersion->appendChild($text);
        $Header->appendChild($DocumentVersion);

        $MerchantIdentifier = $dom->createElement('MerchantIdentifier');
        $text = $dom->createTextNode($userData['MerchantIdentifier']);
        $MerchantIdentifier->appendChild($text);
        $Header->appendChild($MerchantIdentifier);

        $MessageType = $dom->createElement('MessageType');
        $text = $dom->createTextNode("Relationship");
        $MessageType->appendChild($text);
        $AmazonEnvelope->appendChild($MessageType);

        $PurgeAndReplace = $dom->createElement('PurgeAndReplace');
        $text = $dom->createTextNode("false");
        $PurgeAndReplace->appendChild($text);
        $AmazonEnvelope->appendChild($PurgeAndReplace);
        $ID = 1;
        foreach ($data as $key => $value) {
            if(isset($value['childSku'])){
                $Message = $dom->createElement('Message');
                $AmazonEnvelope->appendChild($Message);

                $MessageID = $dom->createElement('MessageID');
                $text = $dom->createTextNode($ID);
                $ID++;
                $MessageID->appendChild($text);
                $Message->appendChild($MessageID);

                $OperationType = $dom->createElement('OperationType');
                $text = $dom->createTextNode("Update");
                $OperationType->appendChild($text);
                $Message->appendChild($OperationType);

                $Relationship = $dom->createElement('Relationship');
                $Message->appendChild($Relationship);

                $ParentSKU = $dom->createElement('ParentSKU');
                $text = $dom->createTextNode($value['FSKU']);
                $ParentSKU->appendChild($text);
                $Relationship->appendChild($ParentSKU);

                foreach ($value['childSku'] as $k=> $v) {
                    $Relation = $dom->createElement('Relation');
                    $Relationship->appendChild($Relation);

                    $SKU = $dom->createElement('SKU');
                    $text = $dom->createTextNode($v);
                    $SKU->appendChild($text);
                    $Relation->appendChild($SKU);

                    $Type = $dom->createElement('Type');
                    $text = $dom->createTextNode("Variation");
                    $Type->appendChild($text);
                    $Relation->appendChild($Type);

                }
            }else{
                continue;
            }

        }
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time()."5.xml";
        $dom->save($xmlName);
        return $xmlName;
    }
}