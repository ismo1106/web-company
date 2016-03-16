<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $segment = $this->uri->segment(4);
        $data['_title']     = 'Sambu Group Profile';
        if($segment == 1){
            $data['_subTitle']  = 'Our History';
            $data['_content']   = "<p>The value of coconuts is unfathomable. Few understand the holistic chain of attributes it can provide, 
                right from the outermost layer of husk to the innermost core of white meat. The list of produce is exponential to its parts.</p>
                <p>Coconut. Enormous benefits.</p>
                <p>Husk, shell, parings, white meat, copra, water…each component has its varied uses from food to non-food items, from industrial 
                to household purposes. The mattresses we sleep on, ropes we use , and seats we covet are sometimes made with coconut fiber. </p>
                <p>Other parts of coconuts are made into edibles and ingredients for confectioners, chefs and homemakers the world over, in their 
                preparation for pastries, chocolates, desserts, authentic Asian dishes, the list goes on and on...</p>
                <p>Coconut has demonstrated its indispensable role in our daily lives.</p>
                <p>No parts of a coconut are put to waste. Its uses are multiple and its values are wholesome. With this insight to the life cycle 
                of a coconut, we know there is no hint of exaggeration when coconut tree was acclaimed as The Tree of Life.</p>
                <p>To keep The Tree of Life as a living legacy, PT. Pulau Sambu was established to maximize the value of coconuts and pass on the 
                goodness to consumers worldwide. Under the visionary and enterprising leadership of the founder, Mr. Tay Juhana, it has from 
                the very beginning been positioned as a coconut specialist.</p>
                <br/>
                <img align='right' src='".base_url()."/assets/img/map.gif' class='img-rounded'/>
                <h5>The legacy of The Sambu Group begins...</h5>
                <p>It started humbly as a coconut oil processing plant, PT Pulau Sambu Kuala Enok, in the Riau province of Sumatra, Indonesia 
                in 1967, focusing on producing crude coconut oil, cooking oil and copra expeller for the export market. Products are ensured 
                of internationally accepted standards.</p>
                <p>In 1983, a second processing plant was founded. PT Pulau Sambu Guntung concentrated on manufacturing desiccated coconut, 
                coconut cream and made known its house brand, Kara, to nationwide, particularly Asian, Australian, the United States and European 
                markets.</p>
                <p>In 1993, with superior raw materials for quality production coupled with rising market demands, a third production and 
                processing plant, PT Riau Sakti United Plantations (RSUP), was set up. It handles desiccated coconut and coconut cream production 
                for export markets.</p>
                <p>In 1995, a pineapple production plant was set up in RSUP to produce canned pineapples and subsequently pineapple juice 
                concentrate in 1999.</p>
                <p>From the 60s till the 90s, Mr. Tay Juhana's effort expanded from production and processing to crop intensification. And the 
                synergy of dedication and innovation lives on</p>
                <p>These were all made possible by sheer determination and absolute focus on quality.</p>
                <br/>
                <img align='left' src='".base_url()."/assets/img/boat.jpg' class='img-rounded' style='padding-right: 25px;'/>
                <p>The Sambu Group today has emerged as the single largest integrated coconut industry in the world, showcasing 3 factories. 
                PT Pulau Sambu Kuala Enok, PT Pulau Sambu Guntung and PT Riau Sakti United Plantations, all internationally recognized as leaders 
                in the coconut and pineapple industries. In addition, the Group's operations have philanthropically established social 
                communities to provide for all workers' basic needs including lodging, educational, medical and recreational facilities. What 
                could have been a barren land with scarce business activities has now thrived and evolved from a rural area to a vibrant 
                community.</p>
                <p>Sambu Group prides ourselves as producers who are committed to delivering the best products catering to the world market.</p>";
            $data['_imageDiv']  = NULL;
        }elseif ($segment == 2) {
            $data['_subTitle']  = 'Ethical Trading';
            $data['_content']   = "<blockquote style='font-style: italic; color: green;'>
                ...to promote a community of harmony <br/>
                ...to strike a delicate balance of quality business and social wellness <br/>
                <p align='right'><small>Sambu Group, The Coconut Family on Riau Province of East Sumatra</small></p>
                </blockquote>
                <img align='right' src='".base_url()."/assets/img/ethicaltrade2.jpg' class='img-rounded'/>
                <p>Once a barren land with scarce business activities, now a thriving vibrant community… the transition from rural area to 
                today’s community of harmony with gainful employment is a conscientious effort towards contributing to the society, a core part 
                of our corporate culture.</p>
                <p>We believe in investment and employees are our best asset, only when employees welfare are well taken care of can a company 
                grow in pride. As a socially responsible company, we strive to meet employees and their families needs so as to achieve happiness 
                in our own little ways.</p>
                <p>Implementation is key and we continuously develop three core sectors that give birth to a community of harmonious living<p>
                <br/>
                <h5>Gainful Employment</h5>
                <p>All three manufacturing sites continuously create employment for the locals which provide them with stable income to fulfil 
                their basic needs including that of their families.</p>
                <p>A healthy and safe working environment is created for each employee.</p>
                <ul>
                    <li>PT Pulau Sambu Kuala Enok, the coconut oil plant, and PT Pulau Sambu Guntung, the desiccated coconut and coconut 
                    milk plant, are accredited to Occupational Health and Safety Standard 18001</li>
                    <li>Safety trainings are given to new and existing employees periodically</li>
                    <li>No child labour is allowed on site</li>
                    <li>Every shift of worker is provided one complimentary meal</li>
                </ul>
                <p>Fair remuneration</p>
                <ul>
                    <li>Minimum wage is always set above both industrial and government standards and increments are followed accordingly</li>
                    <li>Shift system is employed to ensure employees working hours are in line with industrial standards</li>
                    <li>Overtime is only required during peak periods and on voluntary basis only</li>
                </ul>
                <p>PT Pulau Sambu Kuala Enok and PT Pulau Sambu Guntung are accredited to environmental standard ISO14001. All practices are 
                environmentally friendly in accordance to the protocol.</p>
                <p>Embraces the Principle of Total Quality Management and continuously upgrade skills of the workforce where applicable.</p>
                <br/>
                <h5>Social Wellness</h5>
                <p>All employees and their families, a total community of 50,000 on Riau Province, are provided with housing, educational and 
                recreational facilities all at heavily subsidised rates, amounts that are affordable taking into considerations of their income. 
                This is implemented to prevent wellness programme from being abused and at the same time ensuring adequate living standards for 
                all.</p>
                <img align='left' src='".base_url()."/assets/img/ethicaltrade.jpg' class='img-rounded' style='padding-right: 25px;'/>
                <p>Housing allocations</p>
                <p>Polyclinics facilities</p>
                <p>Religious centres – mosques, temples and churches are built with respect to religious sensitivities.</p>
                <p>Educational facilities</p>
                <ul>
                    <li>Schools from kindergarten to secondary levels are built to provide basic education for children and equip 
                    them with social skills</li>
                    <li>All children are ferried to and from school at no charges, via the group’s specially constructed canal system</li>
                    <li>Educational system and curriculum are constantly upgraded to keep up with societal changes</li>
                </ul>
                <p>Playgrounds and communal areas are built to foster social bonding & enhance community spirit.</p>
                <img align='right' src='".base_url()."/assets/img/ethicaltrade4.jpg' class='img-rounded'/>
                <p>Marketplaces are built to open up different avenues for locals to earn their keeps. Stalls are leased out for sales of 
                daily necessities, and in turn create little bustling business areas to keep the community vibrant.</p>
                <p>These facilities are also open to non-employees, a move towards harmonious living for all.</p>
                <p>In the pipeline, a 3 storey separate office building on Guntung site is now being converted into a hospital and due 
                for completion by 2006, operational by 2007/2008.</p>
                <br/>
                <h5>Basic Provisions</h5>
                <p>Water and electricity are supplied to employees and families of all three manufacturing sites at subsidised rate.</p>
                <p>At Sambu Group, we believe in fair trade.</p>
                <blockquote style='font-style: italic; color: green;'>
                    Love makes the world go round, Ethics make Sambu Group grow well!
                </blockquote>";
            $data['_imageDiv']     = '';
        }else {
            $data['_subTitle']  = 'Corporate Philosophy';
            $data['_content']   = '<p>We believe in being First.</p>
                <p>We will conduct our businesses with Honesty and Integrity to achieve the best Quality Products & Services.</p>
                <p>We trust our People to do their best and to Continuously Progress in Ideas and Processes to achieve the highest 
                Customer Satisfaction.</p>';
            $data['_imageDiv']  = NULL;
        }        
        $this->template->display('front_page/profile/index',$data);
    }
    
    function ofFor(){
        $member = $this->uri->segment(4);
        if($member == 'psg'){
            $data['_title']     = 'Pulau Sambu Guntung Profile';
            $data['_content']   = "<p>PT Pulau Sambu Guntung (PSG) was founded in 1983 in Guntung in Riau Province. From the beginning, 
                PSG's main products have been coconut cream and desiccated coconut.</p>
                <p>PSG is a supplier of desiccated coconut to well known confectioners and chocolate industries in Europe, North America, 
                Australia, Middle East and China. Its coconut cream, under the Kara brand name, is now popular in Asian, Australian and 
                European markets. With the ever increasing popularity of Asian dishes that have coconut cream as an ingredient, the market 
                for coconut cream is bound to expand worldwide.</p>
                <p>Prior to production, the best quality coconuts are screened and selected to produce the highest quality coconut cream 
                and desiccated coconut using high technology equipment. One of the keys to the high quality of PSG's desiccated coconut 
                is its Proctor and Schwartz's three stage dryer which was built specifically for the company's application. In addition, 
                the Alfal-Laval production line, which has been painstakingly perfected over the years, now produces coconut cream of a 
                quality second to none.</p>
                <p>Encouraged by the success of Kara cream, PSG expanded its production to produce nata de coco, coconut virgin oil for 
                pharmaceutical industry, charcoal from coconut shell, coconut water and drinking water under the brand name of Kara Ases. 
                In 2001, PSG started commercial production of spray dried Coconut Milk Powder.</p>
                <p>PSG has 4000 employees, all fully committed to the implementation of Hazard Analysis Critical Control Point (HACCP) 
                standardization, a stringent hygiene standard which requires continuous monitoring and inspection of the various stages 
                of the production process. In November 2000, PSG was awarded both ISO9002 and HACCP certification by SGS Singapore.</p>
                <p>Like PSK, PSG is also a fully self sufficient and self supporting complex. The complex has satellite communications 
                facilities and its own power generator that provides electricity for the entire complex as well as for domestic use by 
                the employees. Its port built in 1989 is equipped with two 40ft heavy container cranes that can load large ocean going 
                vessels efficiently.</p>
                <p>Another distinct advantage of PSG is that it is strategically located near Singapore. All cargoes are exported via 
                Singapore's efficient and world class seaport.</p>";
            $this->template->display('front_page/profile/sub',$data);
        }elseif($member == 'pske'){
            $data['_title']     = 'Pulau Sambu Kuala Enok Profile';
            $data['_content']   = "<p>PT Pulau Sambu Kuala Enok (PSKE) was founded in 1967 with a work force of 30 on the tropical island 
                of Nyiur, in the Indragiri district of Riau province. In the early stages of its operation, it relied solely on traditional 
                methods to produce crude coconut oil for the local market.</p>
                <p>Realizing the importance of a continuous supply of fresh and quality coconuts, the company has established a close and 
                mutually beneficial relationship with the coconut farmers in its surrounding regions. This has advertently created a stable 
                avenue for coconut farmers to earn their keeps.</p>
                <p>The company began to invest in modern and high capacity machinery from Germany and Sweden in the early 1970s. In 1979, 
                the company built its own storage facilities and installed a 400 tons per hour blow pump loading system for coconut oil. 
                The handling of raw material and the loading of copra extraction pellets are efficiently done using an integrated system 
                of conveyor belts.</p>
                <p>30 over years after its founding, PSKE is now a self contained and self sufficient production complex. It has its own 
                power plant with steam generators heated by coconut shells, modem telecommunications facilities, jetties that allow vessels 
                of up to 30000 dwt to berth and load, a multi purpose training center, housing for over 2000 employees and more than a 
                hundred boats to transport raw copra and coconuts.</p>
                <p>Today PSK produces primarily crude coconut oil, cooking oil and copra extraction pellets. These products are exported 
                to Asian countries, Europe, USA and Australia.</p>
                <p>PSKE is the nucleus of the Sambu Group. It has given birth to more than a dozen other companies. Since its inception, 
                PSKE has striven to be a global player in the coconut industry.
                <p>The company firmly believes in constantly upgrading the skills of its workforce so that it can compete globally. In 
                the 1990s, it has adopted and practised the Principle of Total Quality Management (TQM).</p>
                <p>On 23rd September 1995, for its effective implementation of TQM at all levels, PSK was awarded the ISO9002 certificate 
                by the Singapore Institute of Standards and Industrial Research (SISIR) which is now referred to as Productivity & Standards 
                Board (PSB) Corp of Singapore.</p>
                <p>In the year 2000/2001, PSK went on to achieve ISO14001 (Environmental Management System), OHSAS 18001 (Occupational 
                Health & Safety), ISO 17025 (Laboratory Standard) and GMP / HACCP.</p>
                <p>PSK strictly implements its quality improvement program in the belief that only by maintaining world class quality 
                standards of production and management can a company survive in tomorrow's competitive global business environment.</p>";
            $this->template->display('front_page/profile/sub',$data);
        }elseif($member == 'rsup'){
            $data['_title'] = 'Riau Sakti United Platation Profile';
            $data['_content']   = "Belum ada isi nee....";
            $this->template->display('front_page/profile/sub',$data);
        }
    }
    
    function of($kodeProfile){
        $this->load->model('M_Profile');
        $layout = $this->M_Profile->checkLayoutProfile($kodeProfile);
        
        if($layout == 1){
            $data['_selectContentProfile']  = $this->M_Profile->selectWhereContentProfile($kodeProfile);
            $this->template->display('front_page/profile/fullText',$data);
        }elseif ($layout == 2){
            $data['_selectContentProfile']  = $this->M_Profile->selectWhereContentProfile($kodeProfile);
            $this->template->display('front_page/profile/onTop',$data);
        }elseif ($layout == 3) {
            $data['_selectContentProfile']  = $this->M_Profile->selectWhereContentProfile($kodeProfile);
            $this->template->display('front_page/profile/onRight',$data);
        }else{
            redirect('error/error_404');
        }
    }
}

/* End of file profile.php */
/* Location: ./application/controllers/front/profile.php */