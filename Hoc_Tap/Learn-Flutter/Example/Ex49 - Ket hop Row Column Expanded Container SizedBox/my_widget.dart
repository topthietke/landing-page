import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';

class MyWidget extends StatelessWidget {
  MyTitle title = MyTitle();
  MyContent content = MyContent();
  MyButton button = MyButton();

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Container(
        margin: EdgeInsets.all(10),
        child: Column(
          children: [
            Row(
              children: [
                SizedBox(
                  width: 80,
                  child: Text(
                    title.b1,
                    style: TextStyle(fontSize: 14, color: Colors.grey),
                  ),
                ), // SizedBox
                Text(
                  content.b1,
                  style: TextStyle(fontSize: 14, color: Colors.black),
                ),
              ],
            ),
            SizedBox(height: 10),
            Row(
              children: [
                SizedBox(
                  width: 80,
                  child: Text(
                    title.b2,
                    style: TextStyle(fontSize: 14, color: Colors.grey),
                  ),
                ), // SizedBox
                Text(
                  content.b2,
                  style: TextStyle(fontSize: 14, color: Colors.black),
                ),
              ],
            ),
            SizedBox(height: 10), // Row
            Row(
              children: [
                SizedBox(
                  width: 80,
                  child: Text(
                    title.b3,
                    style: TextStyle(fontSize: 14, color: Colors.grey),
                  ),
                ), // SizedBox
                Text(
                  content.b3,
                  style: TextStyle(fontSize: 14, color: Colors.black),
                ),
              ],
            ),
            SizedBox(width: 30),
            Row(
              children: [
                Expanded(
                  child: ElevatedButton(                
                    onPressed: () {},    
                    style: ElevatedButton.styleFrom(
                        foregroundColor: Colors.white,
                        backgroundColor: Colors.green, 
                        shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(8),
                        ),
                    ),              
                    child: Text(
                      button.b1,
                      style: TextStyle(fontSize: 14, color: Colors.white),
                    ),
                  ),
                ),
                 Expanded(
                  child: ElevatedButton(                
                    onPressed: () {},    
                    style: ElevatedButton.styleFrom(
                        foregroundColor: Colors.white,
                        backgroundColor: Colors.blue, 
                        shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(8),
                        ),
                    ),              
                    child: Text(
                      button.b2,
                      style: TextStyle(fontSize: 14, color: Colors.white),
                    ),
                  ),
                ),
              ],
            ), // Row // Row
          ],
        ),
      ),
    );
  }
}
