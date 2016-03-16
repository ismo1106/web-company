<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $segment = $this->uri->segment(4);
        if($segment == 1){
            $this->template->display('front_page/sambu_group/product/consumer');
        }elseif($segment == 2){
            $this->template->display('front_page/sambu_group/product/industrial');
        }else{
            echo 'Page not Found...';
        }   
    }
    
    function consumer(){
        $segment = $this->uri->segment(4);
        if($segment == 1){
            $data['_title']     = 'Kara - Coconut Cream';
            $data['_category']  = 'Food';
            $data['_client']    = 'Consumer';
            $data['_image']     = 'dt-1';
            $data['_content']   = "<p class='text-justify'>With the strength of a fully integrated coconut and pineapple supply chain 
                establishment, we have developed our house brand, Kara®, to bring forth quality consumer products to markets worldwide.</p>
                <p class='text-justify'>The Kara® Line started with highly sought after coconut products ideal as ingredients in many 
                authentic Asian and oriental dishes, and expanded to pineapple products and popular desserts.</p>
                <p class='text-justify'>With consistency in quality and continuous product innovation, Kara® has now become the household 
                brand in Asia.</p>
                <h5>Kara® Coconut Range:</h5>
                <p>Canned Coconut Cream/Milk</p>
                <p>UHT Coconut Cream/Milk</p>
                <p>Coconut Cream Powder</p>
                <p>Creamed Coconut/Paste</p>
                <p>Desiccated Coconut</p>
                <h5>Kara® Pineapple & Others:</h5>
                <p>Assortments of Canned Pineapple</p>
                <p>Nata de Coco</p>
                <p>Aloe Vera</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 2){
            $data['_title']     = 'Kara - Coconut Cream';
            $data['_category']  = 'Food';
            $data['_client']    = 'Consumer';
            $data['_image']     = '';
            $data['_content']   = "<p class='text-justify'>With the strength of a fully integrated coconut and pineapple supply chain 
                establishment, we have developed our house brand, Kara®, to bring forth quality consumer products to markets worldwide.</p>
                <p class='text-justify'>The Kara® Line started with highly sought after coconut products ideal as ingredients in many 
                authentic Asian and oriental dishes, and expanded to pineapple products and popular desserts.</p>
                <p class='text-justify'>With consistency in quality and continuous product innovation, Kara® has now become the household 
                brand in Asia.</p>
                <h5>Kara® Coconut Range:</h5>
                <p>Canned Coconut Cream/Milk</p>
                <p>UHT Coconut Cream/Milk</p>
                <p>Coconut Cream Powder</p>
                <p>Creamed Coconut/Paste</p>
                <p>Desiccated Coconut</p>
                <h5>Kara® Pineapple & Others:</h5>
                <p>Assortments of Canned Pineapple</p>
                <p>Nata de Coco</p>
                <p>Aloe Vera</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 3){
            $data['_title']     = 'Kara - Coconut Cream';
            $data['_category']  = 'Food';
            $data['_client']    = 'Consumer';
            $data['_image']     = '';
            $data['_content']   = "<p class='text-justify'>With the strength of a fully integrated coconut and pineapple supply chain 
                establishment, we have developed our house brand, Kara®, to bring forth quality consumer products to markets worldwide.</p>
                <p class='text-justify'>The Kara® Line started with highly sought after coconut products ideal as ingredients in many 
                authentic Asian and oriental dishes, and expanded to pineapple products and popular desserts.</p>
                <p class='text-justify'>With consistency in quality and continuous product innovation, Kara® has now become the household 
                brand in Asia.</p>
                <h5>Kara® Coconut Range:</h5>
                <p>Canned Coconut Cream/Milk</p>
                <p>UHT Coconut Cream/Milk</p>
                <p>Coconut Cream Powder</p>
                <p>Creamed Coconut/Paste</p>
                <p>Desiccated Coconut</p>
                <h5>Kara® Pineapple & Others:</h5>
                <p>Assortments of Canned Pineapple</p>
                <p>Nata de Coco</p>
                <p>Aloe Vera</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 4){
            $data['_title']     = 'Smooze - Fruit Ice';
            $data['_category']  = 'Beverage';
            $data['_client']    = 'Consumer';
            $data['_image']     = 'dt-4';
            $data['_content']   = "<p>100% finest natural ingredients<br/>
                <em>(real fruit purees and juices not from concentrate + freshly pressed coconut milk)</em></p>
                <p>100% dairy free with a creamy smooth texture</p>
                <p>Rich in vitamin C</p>
                <p>Low fat</p>
                <p>0% trans fat</p>
                <p>0% cholesterol</p>
                <p>0% preservatives</p>
                <p>0% gluten</p>
                <p>Non GM</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 5){
            $data['_title']     = 'TropiColada';
            $data['_category']  = 'Beverage';
            $data['_client']    = 'Consumer';
            $data['_image']     = 'dt-5';
            $data['_content']   = "<p class='text-justify'>An all season favourite, TropiColada™ teases your tastebuds with chock full of 
                tropical fruity freshness lusciously blended with aromatic coconut cream. Just the right oomph to make you go ooh...</p>
                <p class='text-justify'>Tastefully concocted with real fruit juices of pineapple, passion fruit and mango, TropiColada™ 
                comes in choices of Authentic Pina, Refreshing Passion and Exotic Mango Colada Mixes.</p>
                <p class='text-justify'>Quick and easy to prepare, a nice change from typical messy cocktail preparations.</p>
                <p class='text-justify'>A definite designer blend that combines great tasting with simplicity.</p>
                <p class='text-justify'>Simply irresistible!</p>
                <h5>Colada Mixes and Smoothie Platter :</h5>
                <p>Pina</p>
                <p>Passion</p>
                <p>Mango</p>
                <p>More exciting flavours available</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 6){
            $data['_title']     = 'True Coconut';
            $data['_category']  = 'Organic';
            $data['_client']    = 'Consumer';
            $data['_image']     = 'dt-6';
            $data['_content']   = "<p class='text-justify'><strong>True Coconut - True goodness in a nutshell.</strong> A range highest 
                quality 100% Natural Coconut-based products for the well-informed and discerning consumer, True Coconut offers a rich 
                legacy of healthful traditions.</p>
                <p class='text-justify'>The very first product from this range is True Coconut 100% Natural Coconut Virgin Oil.</p>
                <p class='text-justify'>A promise to live responsibly and naturally, True Coconut delivers the highest quality Natural 
                Coconut Virgin Oil, traceable from the field to your hand. Sans heat and chemical treatment, True Coconut gives you the 
                wholesome extract straight from our freshly expressed 100% natural coconut milk. Raw and Real.</p>
                <p class='text-justify'>You’ve got to try it for yourself to experience the difference between True Coconut Natural 
                Virgin Oil and other brands available in the market. In accordance with Sambu Group’s corporate philosophy, we offer you 
                only the finest quality 100% natural coconut virgin oil.</p>
                <p class='text-justify'><strong>The True Coconut Virgin Oil Integrity</strong></p>
                <p class='text-justify'><em><strong>Sight</strong> - Crystal clear when liquefied, immaculately white when crystallized</em></p>
                <p class='text-justify'><em><strong>Smell</strong> - Fresh and light coconut aroma, reminiscence of the fragrance of freshly 
                expressed coconut milk</em></p>
                <p class='text-justify'><em><strong>State</strong> - Crystallizes in temperatures below 23°C as proof of its unadulterated 
                nature</em></p>
                <p class='text-justify'><em><strong>Taste</strong> - Sweet and mild coconut essence</em></p>
                <p class='text-justify'><em><strong>Texture</strong> - Smooth and easy on throat, almost watery when warmed on tongue</em></p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }elseif($segment == 7){
            $data['_title']     = 'a d a r a';
            $data['_category']  = 'Personal Care';
            $data['_client']    = 'Consumer';
            $data['_image']     = 'dt-7';
            $data['_content']   = "<h5>Nature of Product, <small><em>Nature in a bottle</em></small></h5>
                <p>The impetus behind adara™ is to deliver the highest quality organic coconut virgin oil, traceable from the field to your 
                hand. A notion to live responsibly and naturally, adara™ is thoughtful, you will notice the details.</p>
                <p>What goes on you goes in you which is why we have extracted a base ingredient that is so full of healthy benefits good 
                enough to be eaten just as it is applied onto your skin and hair.</p>
                <p>Organic and biologically pure, coconut virgin oil exhibits characteristics true to our body’s needs, abundance of benefits 
                we love:</p>
                <table class='table table-striped'>
                    <thead style='background : #9999CC;' cellpadding='5'>
                        <tr>
                            <th>Characteristics</th>
                            <th>Benefits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rich in lauric acid natural source of vitamin E</td>
                            <td>
                                <ul>
                                    <li>strengthens connective tissues and aids removal of dead skin cells to promote growth of healthy, 
                                    smooth and supple skin</li>
                                    <li>conditions hair to give a soft silky sheen</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Natural anti-oxidant properties</td>
                            <td>
                                <ul>
                                    <li>helps to prevent premature aging and wrinkling of skin, a preservation of youthful appearance</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Natural anti-bacterial, anti-viral & anti-microbial properties; rich source of medium chain fatty acids 
                            (MCFA) of fruit origin</td>
                            <td>
                                <ul>
                                    <li>speeds healing of mild infections and open wounds as it hastens cell renewal due to the metabolic 
                                    effect MCFA has on cells</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Small molecular structure & uniquely light</td>
                            <td>
                                <ul>
                                    <li>penetrates skin easily allowing skin to drink up all the benefits without greasy after feel</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Fresh & sweet smelling coconut essence</td>
                            <td>
                                <ul>
                                    <li>natural aroma</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Long shelf life of more than 3 years</td>
                            <td>
                                <ul>
                                    <li>stays fresh without the use of preservatives and additives</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <h5>3 Seasons</h5>
                <p>Just like water, organic coconut virgin oil being unadulterated changes its state with drop in temperature. Warm at heart, 
                adara™ crystallises to a dazzling white as temperature drops below 23°C. All it takes is some warmth to bring adara back to 
                pristine clear oil. Simply submerge bottle into warm water or place it in room temperature above 23°C.</p>
                <p>A legendary secret unveiled for modern age application. A fusion of time to see the adara in you.</p>";
            $this->template->display('front_page/sambu_group/product/detail',$data);
        }else{
            echo 'Page not Found...';
        }
    }
    
}

/* End of file product.php */
/* Location: ./application/controllers/front/product.php */