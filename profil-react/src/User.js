import React from 'react';

import UserList from './Userlist';
class User extends React.Component
{
   constructor(props){
      super(props);
      this.state = {
          users: null,
      };
    }
    getUsersFromApi(){
      fetch('http://127.0.0.1:8000/api/users')
          .then(response => response.json())
          .then((result) =>{
              this.setState({
              users: result,
            });
            console.log(this.state.users)
          });
    }
    componentDidMount(){
      this.getUsersFromApi();
    }
  render(){
    const {users} = this.state;

    return (<div className="user">
                <UserList users={users}></UserList>
            </div>)
  }

}

export default User;
