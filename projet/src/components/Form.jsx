import React, { useState } from 'react';

function Form() {
  const [pays, setPays] = useState('');
  const [magnitude, setMagnitude] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();

    // Effectuez ici les actions nécessaires avec les données saisies
    console.log('Pays:', pays);
    console.log('Magnitude:', magnitude);

    // Réinitialisez les champs du formulaire
    setPays('');
    setMagnitude('');
  };

  return (
    <form onSubmit={handleSubmit}>
      <div className="form-group">
        <label htmlFor="pays">Pays:</label>
        <input className="form-control w-25" type="text" id="pays" value={pays} onChange={(e) => setPays(e.target.value)} />
      </div>
      <div>
        <label htmlFor="magnitude">Magnitude:</label>
        <input className="form-control w-25" type="text" id="magnitude" value={magnitude} onChange={(e) => setMagnitude(e.target.value)}/>
      </div><br></br>
      <button className="btn btn-light" type="submit">Valider</button>
    </form>
  );
}

export default Form;