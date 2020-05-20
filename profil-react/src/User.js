import React from 'react';
import Profil from './Profil'

class User extends React.Component
{
   constructor(props){
      super(props);
      this.state = {
          user: {username: 'mihawk', filename: 'oikawa.jpg'},
          users:null
      };
    }
    getUsersFromApi(){
      console.log('appel api user')
      let url = 'http://127.0.0.1:8000/api/users'
      fetch(url, {
        credentials: 'same-origin'
    })
      .then(response => response.json())
      .then(result =>{
        this.setState({
          users: result["hydra:member"]
        })
        console.log(this.state.users)
      })
      
  
  }
    componentDidMount(){
      this.getUsersFromApi();
    }
  render(){

    return (<div className="user">
              <Profil >{this.state.users}</Profil>
           </div>)
  }

}

export default User;
