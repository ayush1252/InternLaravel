use droom;

db.new_suggestion_collection.find({category_name:{$exists:true}}).forEach(function(doc) {
  var category_name;
  category_name = doc.category_name;
  category_name=category_name.toLowerCase();
  category_name = category_name.replace(/[ ]/g,'_');
  category_name = category_name.replace(/[/]/g,'.');
    db.new_suggestion_collection.update(
       { _id: doc._id },
       { $set: 
           { category_name: category_name } 
       }
    );
})
