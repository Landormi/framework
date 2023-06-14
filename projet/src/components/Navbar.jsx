import React, { useState } from "react";
import { NavLink } from "react-router-dom";

const Navbar = () => {
  const [isOpen, setOpen] = useState(false);
  return (
    <nav className="navbar is-primary" role="navigation" aria-label="main navigation">
      <div className="d-flex justify-content-center container">
        <div className={`navbar-menu ${isOpen && "is-active"}`}>
          <div className="d-flex justify-content-between container">
            <NavLink className="navbar-item" activeClassName="is-active" to="/" >
                <img alt="lien" src="/logop1.webp" width="66" height="66"/>
            </NavLink>
            
            <NavLink className="navbar-item" activeClassName="is-active" to="/recherche">
                <img alt="lien" src="/logop2.png" width="66" height="66"/>
            </NavLink>
          </div>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;