import * as React from "react";

function Liste() {
  const data = [
    {instant: "2014-01-31T23:53:37+00:00", lat: 60.252, lon: -152.7081, pays: "Alaska", mag: 1.1, profondeur: 90.2},
    {instant: "2014-01-31T23:48:35+00:00", lat: 37.0703, lon: -115.1309, pays: "Nevada", mag: 1.33, profondeur: 0},
    {instant: "2014-01-31T23:47:24+00:00", lat: 64.6717, lon: -149.2528, pays: "Alaska", mag: 1.3, profondeur: 7.1},
    {instant: "2014-01-31T23:30:54+00:00", lat: 63.1887, lon: -148.9575, pays: "Alaska", mag: 0.8, profondeur: 96.5}
  ]  
  const rows = [];
  for (let i = 0; i < data.length; i++) {
    const item = data[i];
    rows.push(
      <tr key={i}>
            <td className="p-3">{item.instant}</td>
            <td className="p-3">{item.lat}</td>
            <td className="p-3">{item.lon}</td>
            <td className="p-3">{item.mag}</td>
            <td className="p-3">{item.pays}</td>
            <td className="p-3">{item.profondeur}</td>
      </tr>
    );
  }

  return (
 

    <table>
      <thead>
        <tr>
          <th className="p-3">Instant</th>
          <th className="p-3">Latitude</th>
          <th className="p-3">Longitude</th>
          <th className="p-3">Pays</th>
          <th className="p-3">Magnitude</th>
          <th className="p-3">Profondeur</th>
        </tr>
      </thead>
      <tbody>
      {rows}
      </tbody>
    </table>
    
  );
}

export default Liste;

