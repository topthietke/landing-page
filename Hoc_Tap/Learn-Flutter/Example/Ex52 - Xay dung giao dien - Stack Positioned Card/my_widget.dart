import 'package:flutter/material.dart';
import 'package:hello_world/my_text.dart';


class MyWidget extends StatelessWidget {
  MyText text = MyText();
  MyFontFamily family = MyFontFamily();
  MyFontSize fSize = MyFontSize();
  MyImageUrl imageUrl = MyImageUrl();

  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
        // Container(
        //   color: Colors.green        
        // ),
        //
        // --- PHẦN THAY ĐỔI Ở ĐÂY ---
        SizedBox.expand(
          child: Image.asset(
            imageUrl.bg,
            fit: BoxFit.cover, 
          ),
        ),
      // ---------------------------        
        Positioned(
          // Căn hình theo vị trí bottom, left, right
          bottom: 10,
          left: 10,
          right: 10,
          child: Card(
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(10), // Bo góc 10p[x]
            ),
            child: Padding(
              padding: const EdgeInsets.all(10),
              child: Column(
                children: [
                  Text(
                    text.title,
                    style: TextStyle(
                      fontFamily: family.f_BAUHS93,
                      fontSize: fSize.h1,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  SizedBox(height: 10),
                  Text(
                    text.content,
                    textAlign: TextAlign.justify, // Căn đều hai đầu của text
                    style: TextStyle(
                      fontSize: fSize.h1,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }
}
