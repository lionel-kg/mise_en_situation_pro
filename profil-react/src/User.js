import React from 'react';
import Profil from './Profil'

class User extends React.Component
{
   constructor(props){
      super(props);
      this.state = {
          user: {username: 'mihawk', filename: 'oikawa.jpg'},
      };
    }
    /*getUsersFromApi(){
      console.log('appel api user')
      let url = 'http://127.0.0.1:8000/api/user'
      fetch(url, {
        credentials: 'same-origin'
    })
      .then(response => response.json())
      .then(result =>{
        console.log(result)
      })
  
  }
    
    componentDidMount(){
      this.getUsersFromApi();
    }*/
  render(){

    return (<div className="user">
              <Profil user={this.state.user}></Profil>
           </div>)
  }

}

export default User;
