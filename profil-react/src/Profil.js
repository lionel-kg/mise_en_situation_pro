import React from 'react';

import './profil.css';

function Profil() {

  fetch('http://127.0.0.1:8000/api/users')
  .then(response => response.json())
  .then(result =>{
      console.log(result);
  });

  return (
    <div className="profil">
      <div class="container">
        <div class="card col-6 ml-5">
          <div class="card-body">
                    <div class="row">
                        <h5 class="card-title m-auto">Mon profil</h5>
                    </div>
                    <div class="column col-12">
                        <div class="column col-md-12">
                            <div class="img-profil column col-6 mt-2">
                                
                           
                                <div><a class='change-img' href='http://localhost/miseEnSituationS4/phpLegacy/php/formImage.php'>changer de photo</a></div>
                             
                        
                            <div class="column col-6 mt-2">
                                <div>
                                    <label>nom:</label>  <span></span> 
                                </div>
                                <div>
                                    <label>prenom:</label> <span></span>
                                </div>
                                <div>
                                    <label>age:</label> <span>18 ans</span>
                                </div>
                                <div>
                                    <label>ranked:</label> <span>gold III</span>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div><div class="btn-deco"><a class="button" href="http://localhost/miseEnSituationS4/phpLegacy/php/logout.php">deconnexion</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  );
}

export default Profil;
