use droom;
db.new_suggestion_collection.find({photos:{$exists:true}}).forEach(function(doc) {
    var web_photos;
    var web_photoval=-1.0;
    var photos=doc.photos;
    for(var i=0; i<photos.length; i++)
    {
        var tempval=photos[i].primary_photo;
        if(tempval>web_photoval)
        {
            web_photos=photos[i].web_thumb;
            web_photoval=tempval;
        }
    }
    db.new_suggestion_collection.update(
       { _id: doc._id },
       { $set: 
           { photos: web_photos} 
       }
    );
})
