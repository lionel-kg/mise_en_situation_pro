import React, { Children } from 'react';
import './profil.css';

class Profil extends React.Component {
  render(){
    const user = this.props.user;
   const Children = this.props.Children
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
                                  <img src={"/userImage/"} alt='' width='70%'></img>
                                  <div><a className='change-img' href='/image'>changer de photo</a></div>
                              <div className="column col-6 mt-2">
                                  <div>
                                  <label>username:</label><span>{console.log(this.props.Children)}</span> 
                                  </div>
                                  
                                  <div>
                                      <label>age:</label> <span>18 ans</span>
                                  </div>
                                  <div>
                                      <label>ranked:</label> <span>gold III</span>
                                  </div>
                              </div>
                          </div>
                      </div><div className="btn-deco"><a className="button" href="/login">deconnexion</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    ); 
  }
}

export default Profil;
