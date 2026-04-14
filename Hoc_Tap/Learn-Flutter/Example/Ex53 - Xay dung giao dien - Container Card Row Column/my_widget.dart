import 'package:flutter/material.dart';
import 'package:widget_object/my_text.dart';

class MyWidget extends StatelessWidget {
  MyText text = MyText();
  myFontFamily family = myFontFamily();
  myFontSize fSize = myFontSize();
  @override
  Widget build(BuildContext context) {
    return Container(
      color: Colors.pink,
      child: Card(
        color: Colors.pinkAccent, // Màu nền của Card
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(10), // Bo góc 10p[x]
        ),
        child: Padding(
          padding: const EdgeInsets.all(10),
          child: Row(
            children: [
              // Container(
              //     width: 60, 
              //     height: 50, 
              //     color: Colors.red
              // ),
              ClipRRect(
                borderRadius: BorderRadius.circular(10), // Bo góc 10px giống như yêu cầu trước của bạn
                child: SizedBox.expand(
                  child: Image.asset(
                    'assets/images/bg.png',
                    fit: BoxFit.cover,
                  ),
                ),
              ),
              SizedBox(width: 10),
              Expanded(
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      text.title,
                      style: TextStyle(
                        fontSize: fSize.h3,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    Text(
                      text.content,
                      style: TextStyle(
                        fontSize: fSize.h5,
                        fontWeight: FontWeight.normal,
                      ),
                    ),
                  ],
                ),
              ),
              // Container(
              //   width: 20,
              //   height: 20,
              //   color: Colors.blue,
              // ),
              Icon(
                Icons.play_arrow, // Icon hình tam giác (play)
                size: 50, // Kích thước tương ứng với Container cũ
                color: Colors.blue, // Giữ nguyên màu xanh
              ),
              SizedBox(width: 10),
              Column(
                mainAxisSize: MainAxisSize.min,
                children: [
                  Icon(
                    Icons.favorite, // Icon hình tam giác (play)
                    size: 25, // Kích thước tương ứng với Container cũ
                    color: Colors.blue, // Giữ nguyên màu xanh
                  ),
                  Text('4'),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
