 function addressFunction() 
                        { 
                          if (document.getElementById('same').checked) 
                          { 
                            document.getElementById('phousing').value=document. 
                                     getElementById('housing').value; 
                            document.getElementById('pstreet').value=document. 
                                     getElementById('street').value;
                            document.getElementById('pcity').value=document. 
                                     getElementById('city').value;
                            document.getElementById('pstate').value=document. 
                                     getElementById('state').value;
                            document.getElementById('pzip').value=document. 
                                     getElementById('zip').value;            
                          } 
                              
                          else
                          { 
                            document.getElementById('phousing').value=""; 
                            document.getElementById('pstreet').value=""; 
                            document.getElementById('pcity').value="";
                            document.getElementById('pstate').value="";
                            document.getElementById('pzip').value="";

                          } 
                        } 
var check = function() {
                            if (document.getElementById('password1').value ==document.getElementById('password2').value) 
                            {
                              document.getElementById('message').style.color = 'green';
                              document.getElementById('message').innerHTML = 'matching';
                            } else {
                              document.getElementById('message').style.color = 'red';
                              document.getElementById('message').innerHTML = 'not matching';
                            }
                          }
      $('#displaydata').click(function(){

                            $.ajax({
                              url:'adminpanel.php',
                              type:'POST',
                              success:function(responsedata){
                               $('#response').html(responsedata);   
                              }
                            });  
                            });