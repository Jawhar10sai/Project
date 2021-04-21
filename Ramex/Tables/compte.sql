USE [RAMEX]
GO

/****** Object:  Table [dbo].[Compte]    Script Date: 28/12/2020 09:30:30 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Compte](
	[id_compte] [int] IDENTITY(1,1) NOT NULL,
	[login] [varchar](50) NOT NULL,
	[nom] [varchar](50) NOT NULL,
	[password] [varchar](50) NOT NULL,
	[email] [varchar](64) NULL,
	[expire] [int] NULL,
	[date_expiration] [varchar](50) NULL,
	[date_creation] [varchar](50) NULL,
	[bloquer] [int] NULL,
	[commentaire] [varchar](300) NULL,
 CONSTRAINT [PK_Compte] PRIMARY KEY CLUSTERED
(
	[id_compte] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [IX_Compte] UNIQUE NONCLUSTERED
(
	[login] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
