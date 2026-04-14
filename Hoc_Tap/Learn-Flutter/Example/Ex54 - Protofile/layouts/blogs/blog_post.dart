
class BlogPost {
  final String title;
  final String excerpt;
  final String imageUrl;
  final String date;

  const BlogPost({
    required this.title,
    required this.excerpt,
    required this.imageUrl,
    required this.date,
  });
}


final List<BlogPost> blogPosts = [
  const BlogPost(
    title: '60 Days Of Flutter: Building a Messenger from Scratch',
    excerpt:
        "In this series I'll be building Messio, A messenger app from scratch using Flutter and writing a daily blog post about it. My goal with...",
    imageUrl: 'https://images.unsplash.com/photo-1587614382346-4ec70e388b28?w=600',
    date: 'Jun 12, 2020',
  ),
  const BlogPost(
    title: '60 Days of Flutter: Building a Messenger: Day 60: Wrapping It Up',
    excerpt:
        'The final day of the 60 days challenge. Here is what I accomplished and what I learned along the way...',
    imageUrl: 'https://images.unsplash.com/photo-1534796636912-3b95b3ab5986?w=600',
    date: 'Aug 10, 2020',
  ),
  const BlogPost(
    title: 'Flutter State Management: A Deep Dive into BLoC',
    excerpt:
        'State management is one of the most debated topics in Flutter. In this post we explore BLoC pattern in depth...',
    imageUrl: 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600',
    date: 'Sep 5, 2020',
  ),
];
