<?php
 $config=[
        
          'newuser_auth'=>[
                         ['field'=>'username',
                          'label'=>'User Name',
                          'rules' => 'trim|required|min_length[2]|alpha_dash|alpha'
                         ],
                         ['field'=>'email',
                          'label'=>'Your Email Address',
                          'rules' => 'required|is_unique[user.email]'
                         ],
                          ['field'=>'phone',
                          'label'=>'Your Phone Number',
                          'rules'=>'required|alpha_dash|min_length[10]'
                          ],
                          ['field'=>'password',
                          'label'=>'Secure Password',
                          'rules' => 'required|min_length[6]'
                          ],
                           ['field'=>'confirmpass',
                          'label'=>'confirm Password',
                          'rules' => 'required|matches[password]'
                          ]
                          //  ['field'=>'image',
                          // 'label'=>'image',
                          // 'rules' => 'required'
                          // ]

           ],


         'userauth'=> [
                    ['field'=>'email',
                    'label'=>'email',
                    'rules'=>'required'
                   ],
                     [
                    'field'=>'password',
                    'label'=>'password',
                    'rules'=>'required|alpha_dash|min_length[6]'
                     ]
             ],


              'addnewaddress'=> [
                    ['field'=>'p_address',
                    'label'=>'p_address',
                    'rules'=>'required'
                   ],
                     [
                    'field'=>'s_address',
                    'label'=>'Secondry Address',
                    'rules'=>'required'
                     ]
             ]

        

           

            
]

     
     ?>