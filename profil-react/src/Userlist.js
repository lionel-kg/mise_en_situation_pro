import React from 'react';
import Profil from './Profil';
class UserList extends React.Component
{
  
  render(){
    console.log(this.props.users);
    const userList = this.props.users.map( user =>
        console.log(user)
      )

    return (<div className="userList">{userList} <h1>aaaaaaaaaaaaa</h1></div>);
  }
}

export default UserList;
