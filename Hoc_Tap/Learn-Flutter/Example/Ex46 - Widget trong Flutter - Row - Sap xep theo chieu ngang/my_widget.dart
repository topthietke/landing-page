import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';


class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Container(
        color: Colors.orange,
        // padding: EdgeInsets.all(20),
        child: Row(        
          mainAxisSize: MainAxisSize.max,
          mainAxisAlignment: MainAxisAlignment.spaceAround, // Căn giữa theo chiều ngang
          crossAxisAlignment: CrossAxisAlignment.center, //Căn giữa theo chiều dọc
          children: [
              ElevatedButton(
                  onPressed: (){}, 
                  style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.brown,
                      foregroundColor: Colors.white,
                  ),
                  child: Text(text.b1, style: TextStyle(fontSize: 20))
              ),
              Container(                
                child: ElevatedButton(
                    onPressed: (){}, 
                    style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.blue,
                        foregroundColor: Colors.white,
                    ),
                    child: Text(text.b2, style: TextStyle(fontSize: 20))
                ),
              ),
              ElevatedButton(
                  onPressed: (){}, 
                  style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.green,
                      foregroundColor: Colors.white,
                  ),
                  child: Text(text.b3, style: TextStyle(fontSize: 20))
              )
          ],
      ),
    );
  }
}
