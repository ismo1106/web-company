<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Author   : ITD 15
 */
class Accreditation extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->template->display('front_page/accreditation/index');
    }

    public function of(){
        $segment    = $this->uri->segment(4);
        if($segment == 'psg'){
            $data['_title']     = 'Pulau Sambu Guntung';
            $data['_content']   = '<table class="table table-striped" cellpadding="0" cellspacing="0" >
                <thead style="background : #9999CC;">
                    <tr valign="top">
                        <th width="21%" valign="top">Certifications</th>
                        <th width="21%">Date of Original Issue/Last Revision</th>
                        <th width="18%">Certification Bodies</th>
                        <th width="40%">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <tr valign="top">
                        <td><p>ISO 9001:2008 under United Kingdom Ltd Systems &amp; Services Certification</p></td>
                        <td><p>03 March 2009 - 03 March 2012 </p></td>
                        <td><p>SGS - ICS Indonesia</p></td>
                        <td><p>Development and manufacture of:</p>
                            <ul type="square">
                                <li>Desiccated coconut</li>
                                <li>UHT coconut cream  </li>
                                <li> Coconut milk powder</li>
                                <li>Creamed coconut (including creamed coconut square and coconut paste) </li>
                                <li>Virgin coconut oil</li>
                                <li>Sweetened coconut milk</li>
                                <li>Coconut milk beverages</li>
                                <li>Coconut juices</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td height="173"><p>ISO 9001:2000 under American National Standard Institute</p></td>
                        <td><p>May 2003 </p></td>
                        <td><p>SGS - ICS Singapore </p></td>
                        <td><p class="style1">Development and manufacture of:</p>
                            <ul class="style1" type="square">
                                <li> Desiccated coconut</li>
                                <li>Coconut cream</li>
                                <li>Crude coconut oil </li>
                                <li>Coconut milk powder </li>
                                <li>Creamed coconut (including creamed coconut square and coconut paste)</li>
                            </ul>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td><p class="style1">Requirements for a HACCP based Food Safety System under Dutch Accreditation Council (Raad Voor Accreditatie) </p>
                        </td>
                        <td><p class="style1">07 April 2009 - 08 February 2012 </p></td>
                        <td><p class="style1">SGS - ICS Indonesia</p>
                            <span class="style1"></span></td>
                        <td><p class="style1">Manufacture of:</p>
                            <ul class="style1" type="square">
                                <li> Desiccated coconut </li>
                                <li> UHT coconut cream </li>
                                <li> Coconut milk powder </li>
                                <li> Creamed coconut (including creamed coconut square &amp; coconut paste)</li>
                                <li>Virgin coconut oil</li>
                                <li>Sweetened coconut milk</li>
                                <li>Coconut milk beverages</li>
                                <li>Coconut juices</li>
                            </ul>
                            <p>from receipt, storage and preparation of raw materials, processing, packing, storage to distribution of finished products<br>
                            </p></td>
                    </tr>
                    <tr valign="top">
                        <td><p>HALAL</p></td>
                        <td><p>-</p></td>
                        <td><p>Indonesian Council of ULAMA - The Assessment Institute for Foods, Drugs and Cosmetics (LPPOM MUI) </p></td>
                        <td><p>This certification is applicable to the following products:</p>
                            <ul type="square">
                                <li>Coconut cream</li>
                                <li>Coconut milk powder</li>
                                <li>Crude coconut oil </li>
                                <li>Coconut expeller</li>
                                <li>Creamed coconut paste</li>
                                <li>Drinking water</li>
                                <li>Virgin coconut oil</li>
                                <li>Desiccated coconut</li>
                                <li>Aseptic sweetened coconut milk</li>
                                <li>Creamed coconut squares</li>
                                <li>Coco Spot</li>
                                <li>Pasteurised coconut milk (HANA Brand)</li>
                                <li>Activade</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>KOSHER Passover (Jewish Dietary Laws)</p></td>
                        <td><p>-</p></td>
                        <td><p>Organised Kashruth Laboratories </p></td>
                        <td><p>This certification is applicable to the following products: </p>
                            <ul type="square">
                                <li>Coconut virgin oil</li>
                                <li>Desiccated coconut</li>
                                <li>Kara coconut water </li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>KOSHER Dairy (Jewish Dietary Laws)</p></td>
                        <td><p>-</p></td>
                        <td><p>Organized Kashruth Laboratories</p></td>
                        <td><p>This certification is applicable to the following product: </p>
                            <ul type="square">
                                <li>Coconut milk powder</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>KOSHER (Jewish Dietary Laws)</p></td>
                        <td><p>-</p></td>
                        <td><p>Organized Kashruth Laboratories</p></td>
                        <td><p>This certification is applicable to the following products: </p>
                            <ul type="square">
                                <li>Aseptic coconut cream </li>
                                <li>Coconut paste</li>
                                <li>Creamed coconut paste</li>
                                <li>Creamed coconut paste (w/o additive)</li>
                                <li>Creamed coconut squares</li>
                                <li>Desiccated coconut fine flour    </li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>KOSHER Pareve (Jewish Dietary Laws)</p></td>
                        <td><p>-</p></td>
                        <td><p>Organized Kashruth Laboratories</p></td>
                        <td><p>This certification is applicable to the following product: </p>
                            <ul type="square">
                                <li>Sweetened coconut cream </li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td height="115"><p>SMK3 (National Standard for Occupational, Health &amp; Safety Management System) </p></td>
                        <td><p>-</p></td>
                        <td><p>Minister of Manpower &amp; Transmigration Republic of Indonesia </p></td>
                        <td><p>This certification is applicable to all the activities of PT Pulau Sambu Guntung. PT Pulau Sambu Guntung achieves the gold flag award for heresaid standard and we got rank 6th from all of Indonesian company for 2005-2006 period</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td height="72"><p>SNI-19-17025-2000 (ISO/IEC 17025:1999) - Laboratory Quality System</p></td>
                        <td><p>30 April 2003 </p></td>
                        <td><p>National Accreditation Body of Indonesia (KAN) </p></td>
                        <td><p>This certification is applicable to TESTING LABORATORY (both chemical and microbiology) of PT PULAU SAMBU GUNTUNG</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td><p>ISO 14001:2004 (Environmental Management System) </p></td>
                        <td><p>31 October 2003 - 14 September 2014</p></td>
                        <td><p>AJA REGISTRARS</p></td>
                        <td><p>Manufacture of: </p>
                            <ul type="square">
                                <li>Desiccated coconut </li>
                                <li>UHT coconut cream</li>
                                <li>Sweetend coconut milk</li>
                                <li>Coconut milk beverages</li>
                                <li>Coconut water beverages</li>
                                <li>Bottling of drinking water</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td height="167"><p>OHSAS 18001:1999 (Occupational, Health &amp; Safety Management System) </p></td>
                        <td><p>17 March 2004 </p></td>
                        <td><p>AJA REGISTRARS SINGAPORE</p></td>
                        <td><p>Manufacture of: </p>
                            <ul type="square">
                                <li>Desiccated coconut</li>
                                <li>Coconut cream </li>
                                <li>Coconut milk powder </li>
                                <li>Coconut oil </li>
                                <li>Coconut expeller</li>
                                <li>Coconut paste</li>
                                <li>Coconut cream square </li>
                                <li>  Coconut virgin oil </li>
                                <li>Bottling drinking water</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>British Retail Consortium (BRC) Global Standard For Food Safety</p></td>
                        <td><p>03 Agustus 2012 - 20 August 2013</p></td>
                        <td><p>SGS United Kingdom </p></td>
                        <td><p>Manufacture of: </p>
                            <ul type="square">
                                <li>Desiccated coconut</li>
                                <li>UHT coconut cream</li>
                                <li>Coconut milk powder</li>
                                <li>Virgin coconut oil</li>
                                <li>UHT coconut milk beverages</li>
                                <li>UHT coconut water beverages</li>
                            </ul>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td><p>International Food Standard (IFS) Version 5 on Higher Level</p></td>
                        <td><p>25 February 2011 - 24 February 2012 </p></td>
                        <td><p>SGS Germany</p></td>
                        <td><p>Manufacture of: </p>
                            <ul type="square">
                                <li>Desiccated coconut</li>
                                <li>UHT coconut cream</li>
                                <li>Coconut milk beverages</li>
                                <li>Coconut water beverages</li>
                                <li>Coconut milk powder </li>
                                <li>Creamed coconut (including creamed coconut squares &amp; coconut  paste)</li>
                                <li>Virgin coconut oil </li>
                            </ul>
                            <p>This certification is applicable to the following products category: Product Category 5, 9, 11, 13: Fruits &amp; vegetables (produce), Ambient stable hermetically sealed products (canned products), Beverages, Dried goods, Oils and fats</p></td>
                    </tr>
                    <tr valign="top">
                        <td><p>Organic Production</p></td>
                        <td><p>February 2003</p></td>
                        <td><p>SKAL International</p></td>
                        <td><p>This certification is applicable to the following products: </p>
                            <ul type="square">
                                <li>Desiccated coconut</li>
                                <li>UHT coconut milk/cream without stabilizers</li>
                                <li>UHT coconut milk/cream</li>
                                <li>Coconut virgin oil</li>
                                <li>Coconut milk/cream powder</li>
                                <li>Creamed coconut</li>
                                <li>Creamed coconut block</li>
                                <li>Creamed coconut paste</li>
                                <li>Creamed coconut squares</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td height="260"><p>GMP Food Safety</p></td>
                        <td><p>9 September 2004</p></td>
                        <td><p>American Institute of Baking International (AIB International)</p></td>
                        <td><p>This certification is applicable to the following facilities: </p>
                            <ul type="square">
                                <li>Aseptic coconut milk/cream &amp; colada facility achieved Excellent Level </li>
                                <li>Coconut milk powder facility achieved Excellent Level </li>
                                <li>Coconut paste &amp; squares facility achieved Excellent Level</li>
                                <li>Sweetened &amp; unsweetened desiccated coconut facility achieved Satisfactory Level</li>
                            </ul></td>
                    </tr>
                    <tr valign="top">
                        <td><p>Food Security</p></td>
                        <td><p>28 July 2005</p></td>
                        <td><p>American Institute of Baking International (AIB International)</p></td>
                        <td><p>PT Pulau Sambu Guntung facilities has been evaluated against Food Security Evaluation standards </p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td height="66"><p>Zero Accidient Award<br>
                            </p></td>
                        <td><p>2 January 2007<br>
                            </p></td>
                        <td><p>Ministry of Labour and Transmigration</p></td>
                        <td><p>Zero Accident Award from the period 1 January 2004 to 30 November <br>
                                2006</p></td>
                    </tr>
                    <tr valign="top">
                        <td height="66"><p>FSSC 22000<br>
                                (Food Safety System Certification 22000)</p></td>
                        <td><p>6 November 2013 - 6 November 2016<br>
                            </p></td>
                        <td><p>SGS</p></td>
                        <td><p>For The Following activities
                                <strong>Manufacture of desiccated coconut, UHT coconut cream and milk
                                    coconut milk powder, coconut milk beverages and
                                    coconut water beverages, from receipt, storage, and preparation
                                    of raw material,processing,packing,and storage of finished product
                                    (Food sector: Ambitient stable hermetically sealed packs, Beverages, Dried Goods)</strong></p></td>
                    </tr>
                </tbody></table>';
            $this->template->display('front_page/accreditation/index',$data);
        }elseif($segment == 'pske'){
            $data['_title']     = 'Pulau Sambu Kuala Enok';
            $data['_content']   = '<table class="table table-striped" cellpadding="0" cellspacing="0" >
                <thead style="background : #9999CC;">
                    <tr valign="top">
                        <th width="21%" valign="top">Certifications</th>
                        <th width="21%">Date of Original Issue/Last Revision</th>
                        <th width="18%">Certification Bodies</th>
                        <th width="40%">Remark</th>
                    </tr>
                </thead>
                <tbody>
              <tr valign="top">
                <td><p>ISO 9001:2000 </p></td>
                <td><p>23 September 1995 </p></td>
                <td><p>PSB Certification Singapore</p></td>
                <td><p>Quality Management System for quality Assurance in other to provide product have been met with the customer requirements and regulation. PSK have been met in accordance with the Quality Management System Requirements on 23 September 1995 and have been switch to the new version ISO 9001, 2000 version on 1 October 2001</p>
                </td>
              </tr>
              <tr valign="top">
                <td><p>ISO 14001:2004</p></td>
                <td><p>30 May 2000 - 27 Mar 2012</p></td>
                <td><p>AJA-Singapore</p></td>
                <td><p>Part of all function of organization management that have developed, implemented, achieved and maintanance Evironmental Policy. This indicate that PSK have been met the requirements standards of Environmental Management System ISO 1400:2004, environmental national statutory and regulatory</p>
                </td>
              </tr>
              <tr valign="top">
                <td height="116"><p>SMK3</p></td>
                <td><p>2 January 2001</p></td>
                <td><p>The Indonesian Minister of Manpower (SUCOFINDO)</p></td>
                <td><p>Occupational, Health &amp; Safety Management System with recommendation from Indonesian Ministry of Manpower meet the National requirements, Statutory &amp; Regulatory. PT. PSK have been gotten gold flag for this system</p></td>
              </tr>
              <tr valign="top">
                <td><p>OHSAS 18001:1999</p></td>
                <td><p>8 December 2000</p></td>
                <td><p>SGS-ICS Indonesia</p></td>
                <td><p>International standard for OHSAS 18001 (1999 version) requirements about the Occupational, Health &amp; Safety Management System<br>
                </p></td>
              </tr>
              <tr valign="top">
                <td><p>ISO 17025:2000 </p></td>
                <td><p>15 June 2001</p></td>
                <td><p>KAN-Indonesia</p></td>
                <td><p>PT. PSK Laboratory especially Testing Laboratory have been met the General Requirements Competency of Testing Laboratory, International Standard ISO 17025-2000 (ISO/IEC 17025:1999) Laboratory Quality System<br>
                </p></td>
              </tr>
              <tr valign="top">
                <td><p>ISO 17025:2000 </p></td>
                <td><p>12 September 2001<br>
                </p></td>
                <td><p>KAN-Indonesia</p></td>
                <td><p>PT. PSK Laboratory especially Calibration Laboratory have been met the General Requirements Competency of Calibration Laboratory, International Standard ISO 17025-2000 (ISO/IEC 17025:1999) Laboratory Quality System</p>
                </td>
              </tr>
              <tr valign="top">
                <td><p>GMP-HACCP</p></td>
                <td><p>24 July 2001 </p></td>
                <td><p>SGS-ICS Indonesia </p></td>
                <td><p>Based on GMP and HACCP principles that copra expeller and copra extraction pellets have been met Quality Control of Feed Materials for Animal Feed requirements (for foreign supplier), to ensure processing, distribution, storage and product under control condition, meet specification, safe and health for animal, human being and environment<br>
                      </p>
                </td>
              </tr>
              <tr valign="top">
                <td><p>ISM CODE</p></td>
                <td><p>17 September 1998 </p></td>
                <td><p>Dirjen Perhubungan Laut Indonesia </p></td>
                <td><p>Award for Implementation Safety Management meet the International Standard for Marine Tanker (MT Lina 101) </p>
                </td>
              </tr>
              <tr valign="top">
                <td><p>HALAL Certification </p></td>
                <td><p>6 August 2001</p></td>
                <td><p>The Indonesian Council of ULAMA (MUI)</p></td>
                <td><p>PT. PSK Laboratory especially for Crude Coconut Oil &amp; Refined Bleached Deodorized Coconut Oil is "HALAL" in accordance with the Islamic Law for processing, product, additive substances and environment<br>
                </p></td>
              </tr>
              <tr valign="top">
                <td><p>ISPS CODE </p></td>
                <td><p>30 December 2004</p></td>
                <td><p>Dirjen Perhubungan Laut Indonesia </p></td>
                <td><p>Award for Implementation The International Code for the Security of Port Facility </p>
                </td>
              </tr>
              <tr valign="top">
                <td><p>ISPS CODE </p></td>
                <td><p>6 July  2004</p></td>
                <td><p>Dirjen Perhubungan Laut Indonesia </p></td>
                <td><p>Award for Implementation The International Code for the Security of Ships </p></td>
              </tr>
            </tbody>
                </table>';
            $this->template->display('front_page/accreditation/index',$data);
        }elseif($segment == 'rsup'){
            $data['_title']     = 'Riau Sakti United Platation';
            $data['_content']   = '<table class="table table-striped" cellpadding="0" cellspacing="0" >
                <thead style="background : #9999CC;">
                    <tr valign="top">
                        <th width="21%" valign="top">Certifications</th>
                        <th width="21%">Date of Original Issue/Last Revision</th>
                        <th width="18%">Certification Bodies</th>
                        <th width="40%">Remark</th>
                    </tr>
                </thead>
                <tbody>
                        <tr valign="top">
                          <td><p>ISO 9001:2008 under SGS United Kingdom Ltd Systems &amp; Services Certification</p></td>
                          <td><p>07 March 2009 - 07 March 2012</p></td>
                          <td><p>SGS-ICS Indonesia</p></td>
                          <td><p>Development and manufacture of: </p>
                              <ul type="square">
                                <li>Desiccated coconut </li>
                                <li>Canned coconut cream/milk </li>
                                <li>Canned pineapple </li>
                                <li>Pineapple juice concentrate</li>
                                <li>Crude coconut oil</li>
                          </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>HACCP based Food Safety System</p></td>
                          <td><p>10 April 2009 - 10 April 2012</p></td>
                          <td><p>SGS-ICS Indonesia</p></td>
                          <td><p>Manufacture of: </p>
                              <ul type="square">
                                <li> Desiccated coconut </li>
                                <li>Canned coconut cream/milk </li>
                                <li>Canned pineapple </li>
                                <li> Pineapple juice concentrate</li>
                            </ul>
                          <p>from receipt, storage and preparation of raw materials to processing, packing, storage and distribution of finished products</p></td>
                        </tr>
                        <tr valign="top">
                          <td><p>BRC Global Standard for Food Safety - Issue 5 (Grade A) </p></td>
                          <td><p>24 April 2009 - 26 March 2010</p></td>
                          <td><p>SGS United Kingdom Ltd<br>
                          Systems &amp; Services Certification</p></td>
                          <td><p>Manufacture of:</p>
                              <ul type="square">
                                <li>Canned pineapple </li>
                                <li>Aseptic pineapple juice concentrate</li>
                                <li>Desiccated coconut</li>
                                <li>Canned coconut cream/milk  </li>
                            </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>International Food Standard (IFS) Version 5 (Higer Level) </p></td>
                          <td><p>16 September 2011 - 15 September 2012 </p></td>
                          <td><p>SGS-ICS Germany </p></td>
                          <td><p>Manufacture of:</p>
                              <ul type="square">
                                <li> Desiccated coconut</li>
                                <li>Canned coconut cream</li>
                                <li>Canned pineapple</li>
                                <li>Aseptic pineapple juice concentrate</li>
                            </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>Sistem Manajemen Keselamatan dan Kesehatan Kerja (SMK3) (National Standard for Occupational Safety and Health Management System) </p></td>
                          <td><p>3 January 2006 </p></td>
                          <td><p>Minister of Manpower &amp; Transmigration Republic of Indonesia </p></td>
                          <td><p>This certification is applicable to all the activities of PT. Riau Sakti United Plantations - Industry. PT. Riau Sakti United Plantations - Industry achieved the gold flag award for this standard</p>
                          </td>
                        </tr>
                        <tr valign="top">
                          <td><p>Food Security Program (under the Food Security Evaluation Program of the Department of Food Safety/Hygiene)</p></td>
                          <td><p>29 July 2005 </p></td>
                          <td><p>American Institute of Baking International (AIB-International)</p></td>
                          <td><p>PT. Riau Sakti United Plantations - Industry is active in a continuing program of improving and maintaining food security programs </p>
                          </td>
                        </tr>
                        <tr valign="top">
                          <td><p>Food Safey (under the requirements of The AIB Consolidated Standards for Food Safety) </p></td>
                          <td><p>29 July 2005 </p></td>
                          <td><p>American Institute of Baking International (AIB-International)</p></td>
                          <td><p>Achieved excellent level for: </p>
                              <ul type="square">
                                <li>Canned coconut cream/milk</li>
                                <li>Aseptic pineapple juice concentrate </li>
                                <li>Pineapple solid pack </li>
                            </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>Food Safey (under the requirements of The AIB Consolidated Standards for Food Safety)</p></td>
                          <td><p>4 October 2005 </p></td>
                          <td><p>American Institute of Baking International (AIB-International)</p></td>
                          <td><p>Achieved excellent level for: </p>
                              <ul type="square">
                                <li>Desiccated coconut </li>
                              </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>SNI-19-17025-2000 (ISO/IEC 17025:1999) - Laboratory Quality System </p></td>
                          <td><p>28 January 2005</p></td>
                          <td><p>National Accreditation Body of Indonesia (KAN) </p></td>
                          <td><p>This certification is applicable to TESTING LABORATORY of PT. Riau Sakti United Plantations - Industry </p>
                          </td>
                        </tr>
                        <tr valign="top">
                          <td><p>HALAL</p></td>
                          <td><p>24 November 2005 </p></td>
                          <td><p>The Indonesian Council of ULAMA - The Assessment Institute for Foods, Drugs and Cosmetic (LPPOM MUI) </p></td>
                          <td><p>Certification is applicable to the following products:</p>
                              <ul type="square"><li> Desiccated coconut                              
                                </li><li>Canned coconut cream/milk 
                                  </li><li>Canned pineapple
                                  </li><li> Pineapple juice concentrate</li>
                                  <li>Single strength pineapple juice  </li>
                              </ul></td>
                        </tr>
                        <tr valign="top">
                          <td><p>Kosher Certification </p></td>
                          <td><p>2 June 2005 </p></td>
                          <td><p>Organized Kashruth Laboratories </p></td>
                          <td><p>Certification is applicable to the following products:</p>
                            <ul type="square">
                              <li>Canned coconut cream/milk
                              </li><li>Desiccated coconut
                              </li><li>Canned pineapple
                              </li><li>Pineapple juice concentrate
                              </li><li>Frozen fresh pineapple juice                                                                                                                                                      
                            </li></ul></td>
                        </tr>
                        <tr valign="top">
                          <td width="21%"><p>Organic Production </p></td>
                          <td width="21%"><p>2 January 2003 </p></td>
                          <td width="18%"><p>SKAL International </p></td>
                          <td width="40%"><p>This certification is applicable to the following products:</p>
                              <ul type="square">
                                <li> Desiccated coconut
                                </li><li> Canned coconut cream/milk                                
                            </li></ul></td>
                        </tr>
                      </tbody></table>';
            $this->template->display('front_page/accreditation/index',$data);
        }        
    }
}