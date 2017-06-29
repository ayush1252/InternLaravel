use droom;

db.new_suggestion_collection.find({exterior_color:{$exists:true}}).forEach(function(doc) {
  var exterior_color="";
  Object.keys(doc.exterior_color).forEach(function(key) {
    exterior_color = doc.exterior_color[key];
  });
  if(exterior_color.length>1){
    db.new_suggestion_collection.update(
       { _id: doc._id },
       { $set: 
           { exterior_color: exterior_color } 
       }
    );
  }
})
