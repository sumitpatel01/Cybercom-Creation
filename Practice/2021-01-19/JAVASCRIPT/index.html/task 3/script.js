var items = [
    { name: 'sumit', age: 21 },
    { name: 'smite', age: 37 },
    { name: 'jinay', age: 45 },
    { name: 'jemish', age: 25 },
    { name: 'meet', age: 13 },
    { name: 'gaurav', age: 37 }
  ];
  
  console.log(items);
  
  // sort by name
  items.sort(function(a, b) {
    var nameA = a.name.toUpperCase(); // ignore upper and lowercase
    var nameB = b.name.toUpperCase(); // ignore upper and lowercase
    if (nameA < nameB) {
      return -1;
    }
    if (nameA > nameB) {
      return 1;
    }
  
    // names must be equal
    return 0;
  });

  //console.log(items);