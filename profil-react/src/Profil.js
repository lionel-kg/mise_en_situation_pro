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
      <div className="container">
        <div className="card col-6 ml-5">
          <div className="card-body">
                    <div className="row">
                        <h5 className="card-title m-auto">Mon profil</h5>
                    </div>
                    <div className="column col-12">
                        <div className="column col-md-12">
                            <div className="img-profil column col-6 mt-2">
                                
                           
                                <div><a className='change-img' href='http://localhost/miseEnSituationS4/phpLegacy/php/formImage.php'>changer de photo</a></div>
                             
                        
                            <div className="column col-6 mt-2">
                                <div>
                                <label>nom:</label><span></span> 
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
                    </div><div className="btn-deco"><a className="button" href="http://localhost/miseEnSituationS4/phpLegacy/php/logout.php">deconnexion</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  );
}

export default Profil;
